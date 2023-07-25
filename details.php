<?php
include("connection.php");
include("back.php");
$uname=$_SESSION['user_name'];
$lvl=$_SESSION['lvl'];
// $bill_num=str_shuffle("seba123456789");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="2" style="width:900px;height:60px; ">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <td><a href="stock.php">stock</a></td>
        <td><a href="check_stock.php">check stock</a></td>
        <td><a href="medicine_master.php">medicine master</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="purchase.php"> purchase</a></td>
        <td><a href="details.php">details</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
   <table border="2">
    <tr>
        <td>user name</td>
        <td>passsword</td>
        <td>action</td>
        <td>edit</td>

    </tr>
    <?php 
    $query=mysqli_query($con,"SELECT * FROM `login` ");
    while($result=mysqli_fetch_assoc($query)){
        $sl=$result['sl'];
        $unm=$result['user_name'];
        $pass=$result['password'];
        $ac=$result['action'];
        ?>
            <tr>
                <td><?php echo $unm;?></td>
                <td><?php echo $pass;?></td>
                <td><?php echo $ac;?></td>
                <td><a href="edit_details.php?sl=<?php echo base64_encode($sl);?>">edit</a></td>

            </tr>
        <?php
    }
    ?>
   </table>
</body>
</html>