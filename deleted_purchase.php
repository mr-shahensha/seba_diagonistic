<?php
include("connection.php");
$sl=$_REQUEST['sl'];
$query=mysqli_query($con,"DELETE FROM `purchase_details` WHERE `purchase_details`.`sl` = '$sl'");

?>
<p style="color:red;">deleted sucessfully</p>