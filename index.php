<?php
include("connection.php");
$bill_num=str_shuffle("seba123456789");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color:gray; color:black">
    <h1>Seba diagonistic centre</h1>
    <br>
    <table border="2">
        <tr>
        <td><a href="index.php">home</a></td>
            <td><a href="doctor.php">doctor</a></td>
            <td><a href="medicine.php">medicine</a></td>
        </tr>
   </table>
   <br>
    <form action="" method="post">
        <table border="2">
            <tr>
                <td>bill no :<input type="text" readonly value="<?php echo $bill_num ?>"></td>
                <td>customer name :<input type="text" placeholder=" enter customer name" name="customer_name"></td>
                <td>doctor name : <input type="text" placeholder=" enter customer name" name="doctor_name"></td>
            </tr>
            <tr>
                <td>medicine name : <select name="" id="" onchange="fun(this.value)">
                    <option value="">medicine name</option>
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
                    <div id="check">
                        Number of medicines
                    </div>
                </td>
                <td>
                    quantity : <input type="text" readonly value="">
                </td>
            </tr>
            <tr>
                <td>
                    total price  : <input type="text">
                </td>
                <td colspan="2" style="align-intems:center; text-align:center;"><input type="submit" value="submit" name="submit"></td></tr>
        </table>
    </form>
</body>
</html>
<script>
    function fun(check_value){
        $('#check').load('getcheck.php?check_value'+check_value).fadeIn('fast');
}
</script>
