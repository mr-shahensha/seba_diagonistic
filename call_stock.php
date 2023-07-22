<?php
include("connection.php");
$medid=$_REQUEST['medid'];
$in=0;
$out=0;
$query=mysqli_query($con,"SELECT * FROM `stock`  where product_id='$medid';");
while($result=mysqli_fetch_assoc($query)){
    $in=$in+$result['inn'];
    $out=$out+$result['outt'];
}
$sum=$in-$out;
if($sum<=0){
    ?>
    <p style="color:red;" id="sstock">no stock available </p>
    <?php
} else if ($sum==''){
?>
<span> </span>
<?php
}
else{
    ?>
    <input type="text" id="nosk" readonly value="<?php echo $sum;?>"> 
    <?php
    }
    ?>