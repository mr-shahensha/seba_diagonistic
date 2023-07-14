<?php
include("connection.php");
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
$admin=$_REQUEST['admin'];

if($date1!='' && $date2=='' && $admin==''){
    $q1="where date='$date1'";
 }
 
if($date1!='' && $date2!='' && $admin==''){
   $q2="where date between '$date1' and '$date2'";
}
else{
    $q2='';
}
if($date1!='' && $date!='' && $admin!=''){
    $q3="where entry_by='$admin' and date between '$date1' and '$date2' ";
}
else{
    $q3='';
}
?>
<table border="2">
    <tr>
        <td>
        bill no
        </td>
    </tr>
    <?php
$query=mysqli_query($con,"select * from bill $q1.$q2.$q3");
while($result=mysqli_fetch_assoc($query)){
    $bill_no=$result['bill_no'];
    $doctor_id=$result['doctor_id'];
    $customer_id=$result['customer_id'];
    $price=$result['total_price'];
    $entry_by=$result['entry_by'];
    $entry_date=$result['entry_date'];
    ?>
    <td><?php echo $bill_no; ?></td>
    <?php
}
?>
</table>


