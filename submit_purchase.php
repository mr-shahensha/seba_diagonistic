<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include("connection.php");
$medicine_name=$_REQUEST['medicine_name'];
$quantity=$_REQUEST['quantity_id'];
$original_price=$_REQUEST['original_price'];
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y h:i:s a', time());
$query=mysqli_query($con,"select * from medicine");
$f=0;
while($result=mysqli_fetch_assoc($query)){
    $medicine=$result['medicine_name'];
        $f++;
}


$query2=mysqli_query($con,"INSERT INTO `purchase_details` (`sl`, `purchase_id`, `medicine_id`, `quantity`, `original_price`, `purchase_date`) VALUES (NULL, '0', '$medicine_name', '$quantity', '$original_price', '$datetime');");

?>
<table border="2">
    <tr>
        <td>medicine name</td>
        <td>quantity</td>
        <td>original price</td>
        <td>delete</td>
    </tr>
    <?php
        $query3=mysqli_query($con,"select * from purchase_details where `purchase_id`='0'");
        while($result=mysqli_fetch_assoc($query3)){
            ?>
            <tr>
                <td><?php echo $result['medicine_id'];?></td>
                <td><?php echo $result['quantity'];?></td>
                <td><?php echo $result['original_price'];?></td>
                <td><div id="deleted_purchase<?php echo $result['sl'];?>">
                <input type="button" value="delete" onclick="delete_purchase(<?php echo $result['sl'];?>)">
                </div></td>
            </tr>
            <?php
        }
?>
</table>
<input type="submit" value="submit" onclick="buy()" style="width:300px;background-color:blue;color:white;">
<script>
    function delete_purchase(dp){
        if(confirm("are you sure ?")){
        $('#deleted_purchase'+dp).load('deleted_purchase.php?sl='+dp).fadeIn('fast');
        }
    }
</script>