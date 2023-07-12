<?php
include("connection.php");
if(isset($_POST['submit'])){
    $billno=$_REQUEST['billno'];
    $cust_name=$_REQUEST['cust_name'];
    $doctor_name=$_REQUEST['doctor_name'];
    $amount=$_REQUEST['amount'];
    $query=mysqli_query($con,"INSERT INTO `bill` (`sl`, `bill_no`, `doctor_id`, `customer_name`, `date`, `total_price`) VALUES (NULL, '$billno', '$doctor_name', '$cust_name', '0', '$amount');")
}
?>