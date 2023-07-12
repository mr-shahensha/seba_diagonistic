<?php
include("connection.php");
if(isset($_POST['submit'])){
    $billno=$_REQUEST['billno'];
    $cust_name=$_REQUEST['cust_name'];
    $doctor_name=$_REQUEST['doctor_name'];
    $amount=$_REQUEST['amount'];
    date_default_timezone_set("asia/kolkata");
    $datetime = date('d/m/Y h:i:s a', time());
    $query=mysqli_query($con,"INSERT INTO `bill` (`sl`, `bill_no`, `doctor_id`, `customer_name`, `date`, `total_price`) VALUES (NULL, '$billno', '$doctor_name', '$cust_name', '$datetime', '$amount');");
}
?>

<script>
    alert("payment successfull")
    document.location="index.php";
</script>