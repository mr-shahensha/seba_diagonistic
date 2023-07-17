<?php
include("connection.php");
include("back.php");
$uname=$_SESSION['user_name'];
$lvl=$_SESSION['lvl'];
// $bill_num=str_shuffle("seba123456789");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link rel="stylesheet" href="css/index.css">
</head>
<body style="background-color:gray; color:black">
    <header>
        <h1>Seba diagonistic centre</h1>
    </header>
    
    <br>
    <table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <!--ony visible to admin-->
        <?php 
        if($lvl==0){
        ?>
        <td><a href="medicine.php">medicine</a></td>
        <?php 
        }
        ?>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
    <form action="post.php" method="post">
        <input type="text" readonly name="sname" id="sname_id" value="<?php echo $uname;?>">
        <table border="2">
            <tr>
                <td>customer name :<input type="text" placeholder=" enter customer name" name="customer_name" id="customer_id" onkeyup="hidewarn(this.value)"></td>
                <td colspan="2">doctor name : <input type="text" placeholder=" enter customer name" name="doctor_name" id="doctor_id" onkeyup="hidewarn2(this.value)"></td>
            </tr>
            <tr>
                <td >medicine name : <select name="" id="med" onchange="fun(this.value)">
                    <option value="">select</option>
                    <?php 
                    $query=mysqli_query($con,"select * from medicine"); 
                    while($result=mysqli_fetch_assoc($query)){
                        $medicine_id=$result['medicine_id'];
                        $medicine_name=$result['medicine_name'];
                        ?>
                        <option value="<?php echo $medicine_id;?>"><?php echo $medicine_name;?></option>
                        <?php
                    }
                    ?>
                </select>
                </td>
                <td colspan="2">
                 Number of medicines : <div id="check">  <select name="" id="">
                    <option value="">quantity</option>
                 </select>  </div>
                   
                </td>
               
            </tr>
            <tr>
            <td>
                    quantity : <input type="text" value="" placeholder="enter quanity" id="quantity" onkeyup="quan(this.value)">
                </td>
                <td>
                    total price  :  <div id="totalp">000</div> 
                </td>
                <td>
                 <button onclick="return validation()" type="button" name="b1" id="b1" >cart</button>
                </td>
            </tr>
        </table>
        <br>
        <p id="warn" style="color:red;"></p>
        <br>
             <div id="cart_table">
                        no data to preview
             </div>
       </form> 
</body>
</html>
<script>

    function fun(a){
        $('#check').load('getcheck.php?a='+a).fadeIn('fast');
        }
		
       function quan(a){
            var  aprice=parseInt(document.getElementById("aprice").value);
            var newa=parseInt(a);
            var newprice=newa*aprice;
            $('#totalp').load('totalp.php?newprice=' + newprice, function() {
                $(this).fadeIn('fast');
            });
			
        }
        function validation(){
            var customer_id=document.getElementById('customer_id').value;
            var doctor_id=document.getElementById('doctor_id').value;
            if(customer_id.length<3){
                text="please enter customer name";
                document.getElementById('warn').innerHTML=text;
                return false;
            }
            if(doctor_id.length<3){
                text="please enter doctor name";
                document.getElementById('warn').innerHTML=text;
                return false;
            }
            cart();
        }
    function cart(){
        var bill=0;
        var sname_id=document.getElementById('sname_id').value;
        var med_nm=document.getElementById('med').value;
        var aprice=document.getElementById('aprice').value;
        var quantity=document.getElementById('quantity').value;
        var newprice=document.getElementById('newprice').value;

        $('#cart_table').load('cart.php?bill=' + bill+'&med_nm='+med_nm+'&aprice='+aprice+'&quantity='+quantity+'&newprice='+newprice+'&sname_id='+sname_id).fadeIn('fast');

        $('#check').load('getcheck.php?a=').fadeIn('fast');
        document.getElementById('quantity').value="";
        document.getElementById('med').value="";
        $('#totalp').load('totalp.php?newprice=', function() {
                        $(this).fadeIn('fast');
                    });
        }

        function hidewarn(a){
        if(a!=''){
            document.getElementById("warn").innerHTML = "";
        }
        }
        function hidewarn2(a){
            if(a!=''){
            document.getElementById("warn").innerHTML = "";
            }
        }
</script>
