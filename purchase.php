<?php
include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>
        purchage page
    </h1>
    <table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <td><a href="medicine_master.php">medicine master</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="purchase.php"> purchase</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
   <form action="sent_purchase.php" method="post"></form>
    <table border="2">
        <tr>
            <td>
                seller name 
            </td>
        <td colspan="4">
            <input type="text" placeholder="enter seller name" id="seller_name" style="width:410px;" onkeyup="hidewarn()">
            </td>
        </tr>
        <tr>
            <td>medicine name : 
            <select name="medicine_id" id="medicine_name" onchange="hidewarn()">
            <option value="">select medicine name</option>
            <?php
            $query0=mysqli_query($con,"SELECT * FROM `medicine_master` ");
            while($result0=mysqli_fetch_assoc($query0)){
                $medicine0=$result0['medicine_master_name'];
                $medicine_id=$result0['medicine_master_id'];
                   
       ?>
                <option value="<?php echo $medicine_id;?>"><?php echo $medicine0;?></option>
                <?php
            }
                ?>
            </select>
            </td>
        <td>quantity :
            <input type="text" id="quantity_id" placeholder="enter quantity" onkeyup="hidewarn()">
        </td>
        <td>original price :
            <input type="text" id="original_price" placeholder="enter original price" onkeyup="hidewarn(),quan(this.value)">
            </td>
            <td><div id="sum">sum : 000</div></td>
            <td><input type="button" value="cart" onclick="fun()"></td>
        </tr>
    </table>
    <p id="warn" style="color:red;"></p>
    <div id="result"></div>
</body>
</html>
<script>
    function quan(a){
        var quantity_id=parseInt(document.getElementById('quantity_id').value);
        var original_price=parseInt(a);
        var sum=original_price*quantity_id;

        $('#sum').load('total_sum_purchase.php?sum='+sum).fadeIn('fast');

    }
    function fun(){
        var medicine_name=document.getElementById('medicine_name').value;
        var quantity_id=document.getElementById('quantity_id').value;
        var original_price=document.getElementById('original_price').value;
        if(seller_name =="" ||medicine_name =="" || quantity_id =="" || original_price ==""){
            document.getElementById('warn').innerHTML="complete all the feild";
            return false;
        }
        $('#result').load('submit_purchase.php?seller_name='+seller_name+'&medicine_name='+medicine_name+'&quantity_id='+quantity_id+'&original_price='+original_price).fadeIn('fast');
        $('#sum').load('total_sum_purchase.php?sum=000').fadeIn('fast');
       document.getElementById('medicine_name').value="";
        document.getElementById('quantity_id').value="";
        document.getElementById('original_price').value="";

    }

    function hidewarn(){
        document.getElementById('warn').innerHTML="";

    }
    function buy(){
        var seller_name=document.getElementById('seller_name').value;
        $('#result').load('sent_purchase.php?snm='+seller_name).fadeIn('fast');

    }
</script>