<?php
include("connection.php");
$seller_name=$_REQUEST['snm'];
$query3=mysqli_query($con,"select bill_no from bill");
$i=mysqli_num_rows($query3);
$count=strlen($i);
if($count==1){
    $no= "00".$i;
}if($count==2){
    $no="0".$i;
}
if($count==3){
    $no=$i;
}
date_default_timezone_set("asia/kolkata");
$year = date('y');
$month=date('m');
$pid="p".$year.$month.$no;
$query=mysqli_query($con,"SELECT * FROM `purchase_details` where purchase_id='0' "){

}
?>

<table border="2">
<tr>
    <td>purchase bill</td>
</tr>
<tr>
    <td>purchase id</td>
    <td><?php echo $pid;?></td>
</tr>
<tr>
    <td>seller name : </td>
    <td><?php echo $seller_name;?></td>
</tr>
</table>