<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>doctor page</h1>
<table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
            <td><a href="doctor.php">doctor</a></td>
            <td><a href="medicine.php">medicine</a></td>
        </tr>
   </table>
   <br>
    <form action="submit_doctor.php" method="post">
    <table border="2">
        <tr>
            <td><input type="text" placeholder="enter doctor name" name="doctor_name"></td>
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
    </form>
    <br>
    <table border="2">
        <tr><td style=" color:red;">doctor</td></tr>
       <?php
            $query=mysqli_query($con,"select * from doctor");
            while($result=mysqli_fetch_assoc($query)){
                $doctor=$result['doctor_name'];
                   
       ?> 
       <tr>
        <td>
        <?php echo $doctor; ?>
        </td>
       </tr><?php 
            }
       ?>
    </table>   
</body>
</html>