<?php
include("connection.php");
$newprice=$_REQUEST['newprice'];

?>
 <input type="text" id="newprice" name="newprice" value="<?php echo $newprice;?>" readonly>
