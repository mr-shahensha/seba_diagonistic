<?php
include("connection.php");
include("back.php");
$uname=$_SESSION['user_name'];

$sl=base64_decode($_REQUEST['sl']);
$query=mysqli_query($con,"SELECT * FROM `login` where sl='$sl' ");
while($result=mysqli_fetch_assoc($query)){
    $unm=$result['user_name'];
    $pass=$result['password'];
    $ac=$result['action'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>edit details</title>
</head>
<body>
    <table border="2">
        <tr>
            <td>sl : </td>
            <td><input type="text" readonly id="sl" value="<?php  echo $sl;?>"></td>
        </tr>
    <tr>
        <td>username : </td>
        <td><input type="text" id="unm" value="<?php echo $unm;?>"></td>
    </tr>
    <tr>
        <td>pasasword</td>
        <td><input type="text" id="ps" value="<?php echo $pass;?>"></td>   
     </tr>
    <tr>
        <td>action</td>
        <td>
            <select name="" id="slt">
                <option value="0" <?php if ($ac==0){ echo "selected";}?>>active</option>
                <option value="1" <?php if ($ac==1){ echo "selected";}?>>deactive</option>
            </select>    
        </td>    
    </tr>
    <tr>
        <td colspan="2"><input type="button" value="edit" onclick="edit()"></td>
    </tr>
    </table>
    <p id="done" style="color:red;"></p>
</body>
</html>
<script>
        function edit(){
                var sl=document.getElementById('sl').value;
                var unm=document.getElementById('unm').value;
                var ps=document.getElementById('ps').value;
                var slt=document.getElementById('slt').value;
                    if(ps!='' && unm!=''){
                        $('#done').load('get_edit_details.php?sl='+sl+'&unm='+unm+'&ps='+ps+'&slt='+slt).fadeIn('fast');
                    }else{
                            text="please fill all the data";
                            document.getElementById('done').innerHTML=text;
                    }
}
</script>