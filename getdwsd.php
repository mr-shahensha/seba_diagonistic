<?php
include("connection.php");
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
$admin=$_REQUEST['admin'];


if($date1!='' && $date2!='' ){
   $q2=" and date between '$date1' and '$date2'";
}
else{
    $q2='';
}
if( $admin!=''){
    $q3=" and entry_by='$admin'";
}
else{
    $q3='';
}

?>
<table border="2">
    <tr>
        <td>bill no</td>
        <td>doctor name</td>
        <td>customer name</td>
        <td>total price</td>
        <td>entry by</td>
        <td>date</td>
        
    </tr>
    <?php
    $new_price=0;
    $query=mysqli_query($con,"select * from bill where sl>0".$q2.$q3);
    while($result=mysqli_fetch_assoc($query)){
    $bill_no=$result['bill_no'];
    $doctor_name=$result['doctor_id'];
    $customer_name=$result['customer_name'];
    $price=$result['total_price'];
    $new_price=$new_price+$price;
    $entry_by=$result['entry_by'];
    $entry_date=$result['entry_date'];
    ?>
     <tr>
        <td><a href="bill.php?bill_no=<?php echo $bill_no; ?>"><?php echo $bill_no; ?></a></td>
        <td><?php echo $doctor_name; ?></td>
        <td><?php echo $customer_name; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $entry_by; ?></td>
        <td><?php echo $entry_date; ?></td>
    </tr>
  
    <?php
}
?>
 <tr>
    <td>total sale : </td>
    <td colspan="5"><?php echo $new_price; ?></td>
 </tr>
</table>


