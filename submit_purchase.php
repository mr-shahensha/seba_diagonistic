<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include("connection.php");
session_Start();
$uname=$_SESSION['user_name'];
$medicine_name=$_REQUEST['medicine_name'];
$quantity=$_REQUEST['quantity_id'];
$original_price=$_REQUEST['original_price'];
$sum_of_purchase=$_REQUEST['sum_of_purchase'];
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y h:i:s a', time());


$f=0;
$query0=mysqli_query($con,"select medicine_id from purchase_details where medicine_id='$medicine_name' and purchase_id='0' and purchase_by='$uname';");
while($result0=mysqli_fetch_assoc($query0)){
$f++;
}
// $count=mysqli_num_rows($query0);

if($f>0)
{
?>
<b><p style="color :red;">this medicine name is already chosen</p></b><br>

<?php

}
else{
$query2=mysqli_query($con,"INSERT INTO `purchase_details` (`sl`, `purchase_id`, `medicine_id`, `quantity`, `original_price`, `purchase_date`,`sum_of_purchase`,`purchase_by`) VALUES (NULL, '0', '$medicine_name', '$quantity', '$original_price', '$datetime','$sum_of_purchase','$uname') ;");
}
?>
<table border="2">
    <tr>
        <td><b>medicine name</b></td>
        <td><b>quantity</b></td>
        <td><b> original price</b></td>
        <td><b>total price </b></td>
        <td><b>delete</b></td>
    </tr>
    <?php
        $sum=0;
        $query3=mysqli_query($con,"select * from purchase_details where `purchase_id`='0'");
        while($result=mysqli_fetch_assoc($query3)){
            $sum=$sum+$result['sum_of_purchase'];
            $medicine_id=$result['medicine_id'];
            ?>
            <tr>
                <td><?php
                 $query2=mysqli_query($con,"select medicine_name from medicine where medicine_id='$medicine_id'");
                 while($result1=mysqli_fetch_assoc($query2)){
                     $medicine_name=$result1['medicine_name'];
                 }
                echo $medicine_name;?></td>
                <td><?php echo $result['quantity'];?></td>
                <td><?php echo $result['original_price'];?></td>
                <td><?php echo $result['sum_of_purchase'];?></td>
                <td><div id="deleted_purchase<?php echo $result['sl'];?>">
                <input type="button" value="delete" onclick="delete_purchase(<?php echo $result['sl'];?>)">
                </div></td>
            </tr>
            <?php
        }
?>
<tr>
    <td colspan="5">total : <?php echo $sum;?></td>
</tr>
</table>
<input type="submit" value="submit" name="submit" style="width:300px;background-color:blue;color:white;">
<script>
    function delete_purchase(dp){
        if(confirm("are you sure ?")){
        $('#deleted_purchase'+dp).load('deleted_purchase.php?sl='+dp).fadeIn('fast');
        }
    }
</script>