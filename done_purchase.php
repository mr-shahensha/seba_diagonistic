<?php 
include("connection.php");
session_Start();
$uname=$_SESSION['user_name'];
if(isset($_POST['submit'])){
$purchase_id=$_REQUEST['purchase_id'];
$seller_name=$_REQUEST['seller_name'];
$medicine_id=$_REQUEST['medicine_id'];
$quanity=$_REQUEST['quanity'];

$total=$_REQUEST['total'];
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y h:i:s a', time());

$query=mysqli_query($con,"UPDATE `purchase_details` SET `purchase_id` = '$purchase_id' WHERE  `purchase_id`= '0'  and `purchase_by`='$uname'; ");

$query1=mysqli_query($con,"INSERT INTO `purchase` (`sl`, `purchase_id`, `seller_name`, `purchase_by`, `total_purchase`, `purchase_date`) VALUES (NULL, '$purchase_id', '$seller_name', '$uname', '$total', '$datetime');");



$query2=mysqli_query($con,"select * from purchase_details where purchase_id='$purchase_id'");
while($result=mysqli_fetch_assoc($query2)){
        $medicine_idd=$result['medicine_id'];
        $quanityy=$result['quantity'];
        $query3=mysqli_query($con,"INSERT INTO `stock` (`sl`,`product_id`, `in`, `out`, `purchase_id`, `sale_id`) VALUES (NULL,'$medicine_idd', '$quanityy', '', '$purchase_id', '');");
}

}         

?>
<script>
    alert("purchased done");
    document.location="purchase.php";
</script>