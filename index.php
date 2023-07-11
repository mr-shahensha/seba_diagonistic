<?php
include("connection.php");
$bill_num=str_shuffle("seba123456789");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                <td>medicine name : <input type="text" placeholder=" search medicine name"></td>
                <td>
                <input type="radio" id="html" name="fav_language" value="HTML">
                <label for="html">single | </label><br>
                <input type="radio" id="css" name="fav_language" value="CSS">
                <label for="css">all | </label><br>
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