<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
<table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <td><a href="medicine_master.php">medicine master</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="purchase.php"> purchase</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
   <table border="2">
    <tr>
        <td>medicine name : </td>
        <td><input type="text" placeholder="ener medicine name" id="medicine_id"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="button" value="submit" onclick="med()"></td>
    </tr>
   </table>
   <br>
   <div id="result"><table border="2">
    <tr>
        <td>medicine name</td>
    </tr>
<?php
            $query=mysqli_query($con,"select * from medicine_master");
            while($result=mysqli_fetch_assoc($query)){
                $medicine=$result['medicine_master_name'];
                   
       ?> 
       <tr>
            <td>        
                <?php echo $medicine; ?>
            </td>
       </tr><?php 
            }
       ?>
</table></div>
</body>
</html>
<script>
    function med(){
        var medicine_id=document.getElementById('medicine_id').value;
        $('#result').load('sent_med.php?med='+medicine_id).fadeIn('fast');
        document.getElementById('medicine_id').value="";
}

</script>