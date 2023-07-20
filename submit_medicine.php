<?php
include("connection.php");
if(isset($_POST['submit'])){
    $medicine_id=$_REQUEST['medicine_id'];
    $single_price=$_REQUEST['single_price'];
    $price=$_REQUEST['price'];
        $query1=mysqli_query($con,"update `medicine` set `single_price` ='$single_price' ,`price`='$price' where medicine_id='$medicine_id' ");

}
?>
            <script>
                alert(" medicine price submitted ");
                document.location="medicine.php";
            </script>
       