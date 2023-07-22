<?php
include("connection.php");
if(isset($_POST['submit'])){
$seller_name=$_REQUEST['snm'];
$query3=mysqli_query($con,"select purchase_id from purchase");
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

}
?>
<form action="done_purchase.php" method="post">
<table border="2">
<tr>
    <td colspan="4" style="color:blue; text-align:center;">purchase bill</td>
</tr>
<tr>
    <td>purchase id</td>
    <td colspan="3" ><input name="purchase_id" type="text" value="<?php echo $pid;?>" readonly> </td>
</tr>
<tr>
    <td>seller name : </td>
    <td colspan="3"><input  name="seller_name" type="text" readonly value="<?php echo $seller_name;?>"> </td>
</tr>
<tr>
    <td><b> medicine name</b></td>
    <td><b>quantiy</b> </td>
    <td><b>original price</b> </td>
    <td><b>sum</b>  </td>
</tr>
<?php
$total=0;
$query=mysqli_query($con,"SELECT * FROM `purchase_details` where purchase_id='0' ");
while($result=mysqli_fetch_assoc($query)){
       
        $medicine_id=$result['medicine_id'];
        $quantity=$result['quantity'];
        $original_price=$result['original_price'];
        $sum_of_purchase=$result['sum_of_purchase'];
        $total+=$sum_of_purchase;
        ?>

        <tr>
            <td>
                <input type="hidden" name="medicine_id" value="<?php echo $medicine_id;?>">
                <?php
                 $query2=mysqli_query($con,"select medicine_name from medicine where medicine_id='$medicine_id'");
                 while($result1=mysqli_fetch_assoc($query2)){
                     $medicine_name=$result1['medicine_name'];
                 }
                echo $medicine_name;?></td>
            <td><input type="text" name="quanity" value="<?php echo $quantity;?>"> </td>
            <td><?php echo $original_price;?></td>
            <td><?php echo $sum_of_purchase;?></td>
        </tr>
<?php
}
?>
<tr>
    <td>total : </td>
    <td colspan="3" > <input type="text" readonly name="total" value="<?php echo $total;?>"></td>
</tr>
<tr>
    <td colspan="6"><input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>
