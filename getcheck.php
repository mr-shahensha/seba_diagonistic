<?php
include("connection.php");
$check_value=$_REQUEST['a'];
$query=mysqli_query($con,"select single_price,price from medicine where medicine_id='$check_value'");
while($result=mysqli_fetch_assoc($query)){
    $sp=$result['single_price'];
    $p=$result['price'];
}

?>
<select name="" id="aprice">
    <option value="">quantity</option>
    <option value="<?php echo $sp; ?>">single price : <?php echo $sp; ?></option>
    <option value="<?php echo $p; ?>">all price : <?php echo $p; ?></option>

</select>


