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
    <h1>stock</h1>
    <br>
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
    <table border="2">
    <tr>

        <td >medicine name : <select name="" id="med" onchange="fun(this.value)" onchange="fun(this.value)">
                    <option value="">select</option>
                    <?php 
                    $query=mysqli_query($con,"select * from medicine"); 
                    while($result=mysqli_fetch_assoc($query)){
                        $medicine_id=$result['medicine_id'];
                        $medicine_name=$result['medicine_name'];
                        ?>
                        <option value="<?php echo $medicine_id;?>"><?php echo $medicine_name;?></option>
                        <?php
                    }
                    ?>
                </select>
                </td>
                <td>
                available stock :
                <div id="stock"></div>
                </td>
        <td><button type="button" onclick="search()" style="color:blue;">search</button></td>
    </tr>
    </table>
            <br>
            <div id="search">
                serch result
            </div>
</body>
</html>
<script>
      function fun(a){
        $('#stock').load('call_stock.php?medid='+a).fadeIn('fast');
        }
    function search(){
        var med=document.getElementById('med').value;
        $('#search').load('getstock.php?med='+med).fadeIn('fast');
    }
</script>