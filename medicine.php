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
    <h1>medicine page</h1>
    <table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
        <td><a href="dwsd.php">day wise sale detils</a></td>
        <td><a href="pwsd.php">product wise sale detils</a></td>
        <td><a href="stock.php">stock</a></td>
        <td><a href="medicine_master.php">medicine master</a></td>
        <td><a href="medicine.php">medicine</a></td>
        <td><a href="purchase.php"> purchase</a></td>
        <td><a href="logout.php">logout</a></td>
        </tr>
   </table>
   <br>
    <form action="submit_medicine.php" method="post">
    <table border="2">
        <tr>
            <td>
            <select name="medicine_id" id="">
            <option value="">select medicine name</option>
            <?php
            $query0=mysqli_query($con,"SELECT * FROM `medicine_master` ");
            while($result0=mysqli_fetch_assoc($query0)){
                $medicine0=$result0['medicine_master_name'];
                $medicine_id=$result0['medicine_master_id'];
                   
       ?>
                <option value="<?php echo $medicine_id;?>"><?php echo $medicine0;?></option>
                <?php
            }
                ?>
            </select>
        </td>
            <td><input type="text" placeholder="enter single price" name="single_price"></td>
            <td><input type="text" placeholder="enter price" name="price"></td>
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
    </form>
    <br>
    <table border="2">
        <tr><td style=" color:red;">medicine</td>
       <td style=" color:red;">single_price</td>
       <td style=" color:red;">price</td>
    </tr>
       <?php
            $query=mysqli_query($con,"select * from medicine");
            while($result=mysqli_fetch_assoc($query)){
                $medicine=$result['medicine_name'];
                $single_price=$result['single_price'];
                $price=$result['price'];
                   
       ?> 
       <tr>
            <td>        
                <?php echo $medicine; ?>
            </td>
            <td>        
                <?php echo $single_price; ?>
            </td>
            <td>        
                <?php echo $price; ?>
            </td>
       </tr><?php 
            }
       ?>
    </table>   
</body>
</html>