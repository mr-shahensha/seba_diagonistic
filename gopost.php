<?php
include("connection.php");
session_Start();
$uname=$_SESSION['user_name'];
if(isset($_POST['submit'])){
    $billno=$_REQUEST['billno'];
    $cust_name=$_REQUEST['cust_name'];
    $doctor_name=$_REQUEST['doctor_name'];
    $amount=$_REQUEST['amount'];
    date_default_timezone_set("asia/kolkata");
    $datetime = date('d/m/Y h:i:s a', time());



    $query=mysqli_query($con,"INSERT INTO `bill` (`sl`, `bill_no`, `doctor_id`, `customer_name`,  `total_price`, `entry_by`, `entry_date`) VALUES (NULL, '$billno', ' $doctor_name', '$cust_name',  '$amount', '$uname', '$datetime');");

    
    $query1=mysqli_query($con,"UPDATE `bill_details` SET `bill_no` = '$billno' WHERE `bill_details`.`entry_by` = '$uname' and `bill_no`='0'; ");

}
?>

<script>
    alert("payment successfull")
    document.location="index.php";
</script>