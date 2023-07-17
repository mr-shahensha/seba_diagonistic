<?php
include("connection.php");
$cart_id=$_REQUEST['cart_id'];
$query=mysqli_query($con,"DELETE FROM `bill_details` WHERE `bill_details`.`sl` = '$cart_id'");

?>
<p style="color:red;">deleted succesfully</p>