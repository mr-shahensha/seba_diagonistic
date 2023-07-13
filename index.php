<?php
include("connection.php");
include("back.php");
$uname=$_SESSION['user_name'];
// $bill_num=str_shuffle("seba123456789");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color:gray; color:black">
    <h1>Seba diagonistic centre</h1>
    
    <br>
    <table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
    <form action="post.php" method="post">
        <input type="text" readonly name="sname" id="sname_id" value="<?php echo $uname;?>">
        <table border="2">
            <tr>
                <td>customer name :<input type="text" placeholder=" enter customer name" name="customer_name"></td>
                <td colspan="2">doctor name : <input type="text" placeholder=" enter customer name" name="doctor_name"></td>
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
                 <button onclick="cart()" type="button" name="b1" id="b1" >cart</button>
                </td>
            </tr>
        </table>
             <div id="cart_table">
                        no data to preview
             </div>
             <input type="submit" value="submit" name="submit" style="width:300px;background-color:blue;color:white;">

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
</script>
