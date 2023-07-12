<?php
include("connection.php");
$newprice=$_REQUEST['newprice'];
if($newprice!=""){
?>
 <input type="text" id="newprice" name="newprice" value="<?php echo $newprice;?>" readonly>
<?php 
}else{
?>
000
<?php
}
?>