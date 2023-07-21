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
<table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <td><a href="stock.php">stock</a></td>
        <td><a href="medicine_master.php">medicine master</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="purchase.php"> purchase</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
    <form action="post.php" method="post">
        
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
                <td>
                available stock :
                <div id="stock"></div>
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
                  <input type="hidden" name="" id="sname_id" value="<?php echo $uname;?>">
                 <button onclick="return validation()" type="button" name="b1" id="b1" >cart</button>
                </td>
            </tr>
        </table>
        <br>
        <p id="warn" style="color:red;"></p>
        <br>
        <td>
        <div id="cart_table">
                        no data to preview
             </div>
        </td>
             
       </form> 
</body>
</html>
<script>

    function fun(a){
        $('#check').load('getcheck.php?a='+a).fadeIn('fast');
        $('#stock').load('call_stock.php?medid='+a).fadeIn('fast');
        }
		
       function quan(a){
            var  nosk=parseInt(document.getElementById("nosk").value);
            var  aprice=parseInt(document.getElementById("aprice").value);
            var newa=parseInt(a);
            var newprice=newa*aprice;
            if(a>=nosk){
                text="this many stock is not available";
                document.getElementById('warn').innerHTML=text;
                return false;
            }else{
                document.getElementById('warn').innerHTML="";
            $('#totalp').load('totalp.php?newprice=' + newprice, function() {
                $(this).fadeIn('fast');
            });
        }
        }
        function validation(){
            var  nosk=parseInt(document.getElementById("nosk").value);
            var quantity=document.getElementById('quantity').value;
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
                if(quantity>nosk){
                    text="this many stock is not available";
                    document.getElementById('warn').innerHTML=text;
                    return false;
                }else{
                    document.getElementById('warn').innerHTML="";
                    cart();
                    document.getElementById('stock').innerHTML="";

                }
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