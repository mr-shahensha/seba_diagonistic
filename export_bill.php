<?php
include("connection.php");
$bill_no=$_REQUEST['bill_no'];
$file="bill of ".$bill_no.".xls";//.doc
header("Content-type: application/vnd.ms-excel"); //ms-word
header("Content-Disposition: attachment; filename=$file");
?>

<table border="2">
    <tr>      <td><b> bill no : <input type="text" id="bill_no" value="<?php echo  $bill_no;?>"> </b></td>
        <td colspan="5"><b> entry by :  <?php 
    $query2=mysqli_query($con,"SELECT entry_by FROM `bill`  where bill_no='$bill_no'");
    while($result2=mysqli_fetch_assoc($query2)){
        $entry_by=$result2['entry_by'];
    }
    echo $entry_by;

    ?></b></td>
    </tr>
<tr>
    <td>medicine name</td>
    <td>price/piece</td>
    <td>total quantity</td>
    <td>sum</td>
    <td>date</td>
</tr>
<?php
$query=mysqli_query($con,"SELECT * FROM `bill_details`  where bill_no='$bill_no'");
while($result=mysqli_fetch_assoc($query)){
    $medicine_name=$result['medicine_id'];
    $per_p=$result['per_p'];
    $quantity=$result['quantity'];
    $entry_by=$result['entry_by'];
    $date=$result['date'];
    $sum=$result['total_price'];
?>
<tr>
    <td><?php echo $medicine_name;?></td>
    <td><?php echo $per_p;?></td>
    <td><?php echo $quantity;?></td>
    <td><?php echo $sum;?></td>
    <td><?php echo $date;?></td>
</tr>
<?php
 }?>
<tr>
    <td><b>total price</b> </td>
    <td colspan="4"><?php 
    $query1=mysqli_query($con,"SELECT total_price FROM `bill`  where bill_no='$bill_no'");
    while($result1=mysqli_fetch_assoc($query1)){
        $total_price=$result1['total_price'];
    }
    echo $total_price;

    ?></td>
</tr>
</table>