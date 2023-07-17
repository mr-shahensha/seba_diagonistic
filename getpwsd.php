<?php
include("connection.php");
include("back.php");
$lvl=$_SESSION['lvl'];
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
$medicine=$_REQUEST['medicine'];


if($date1!='' && $date2!='' ){
    $q2=" and date between '$date1' and '$date2'";
 }
 else{
     $q2='';
 }
 if( $medicine!=''){
     $q3=" and medicine_id='$medicine'";
 }
 else{
     $q3='';
 }
 
 ?>
 <table border="2">
     <tr>
         <td>date</td>
         <td>medicine name</td>
         <td>price / piece</td>
         <td>quantity</td>
         <td>total sum</td>
         <td>entry by</td>         
     </tr>
     <?php
     $new_price=0;
     if($lvl==0){
     $query=mysqli_query($con,"select * from bill_details where sl>0".$q2.$q3);
     }else{
        $query=mysqli_query($con,"select * from bill_details where sl>0 and entry_by='user'".$q2.$q3);
     }
     while($result=mysqli_fetch_assoc($query)){
     $bill_no=$result['bill_no'];
     $med_id=$result['medicine_id'];
     $per_p=$result['per_p'];
     $quantity=$result['quantity'];
     $price=$result['total_price'];
     $new_price=$new_price+$price;
     $entry_by=$result['entry_by'];
     $entry_date=$result['entry_date'];
     ?>
      <tr>
      <td><?php echo $entry_date; ?></td>
         <td><?php 
         $query2=mysqli_query($con,"select medicine_name from medicine  where medicine_id='$med_id'");
         while($result2=mysqli_fetch_assoc($query2)){
             $medicine_name=$result2['medicine_name'];
         }
         
         
         echo $medicine_name; ?></td>
         <td><?php echo $per_p; ?></td>
         <td><?php echo $quantity; ?></td>
         <td><?php echo $price; ?></td>
         <td><?php echo $entry_by; ?></td>
         
     </tr>
   
     <?php
 }
 ?>
 <tr>
    <td>total sale : </td>
    <td colspan="5"><?php echo $new_price; ?></td>
 </tr>
 </table>