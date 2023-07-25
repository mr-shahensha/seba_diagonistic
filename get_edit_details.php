<?php
include("connection.php");
session_start();
$uname=$_SESSION['user_name'];

$sl=$_REQUEST['sl'];
$unm=$_REQUEST['unm'];
$ps=$_REQUEST['ps'];
$slt=$_REQUEST['slt'];

date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y h:i:s a', time());

//calling data from login table 
$query0=mysqli_query($con,"SELECT * FROM `login` where sl='$sl' ");
while($result=mysqli_fetch_assoc($query0)){
    $ounm=$result['user_name'];
    $opass=$result['password'];
    $oac=$result['action'];
}
//update in login table
$query=mysqli_query($con,"update login set user_name='$unm' , password='$ps' , action='$slt' where sl='$sl'");


if($unm!=$ounm){

        $query1=mysqli_query($con,"INSERT INTO `edit_log` (`sl`, `tbl_nm`, `fld_nm`, `fld_sl`, `old_val`, `new_val`, `edt_by`, `edtm`) VALUES (NULL, 'login', 'user_name', '$sl', '$ounm', '$unm', '$uname', '$datetime');");

    }
    if($ps!=$opass){

        $query2=mysqli_query($con,"INSERT INTO `edit_log` (`sl`, `tbl_nm`, `fld_nm`, `fld_sl`, `old_val`, `new_val`, `edt_by`, `edtm`) VALUES (NULL, 'login', 'password', '$sl', '$opass', '$ps', '$uname', '$datetime');");
    }
    
    if($slt!=$oac){

        $query3=mysqli_query($con,"INSERT INTO `edit_log` (`sl`, `tbl_nm`, `fld_nm`, `fld_sl`, `old_val`, `new_val`, `edt_by`, `edtm`) VALUES (NULL, 'login', 'action', '$sl', '$oac', '$slt', '$uname', '$datetime');");
    }

?>
<script>
    alert("data updated")
    document.location="details.php";
</script>