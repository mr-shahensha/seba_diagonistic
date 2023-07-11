<?php
include("connection.php");
if(isset($_POST['submit'])){
    $medicine_name=$_REQUEST['medicine_name'];
    $single_price=$_REQUEST['single_price'];
    $price=$_REQUEST['price'];
    $query=mysqli_query($con,"select * from medicine");
    $f=0;
    while($result=mysqli_fetch_assoc($query)){
        $medicine=$result['medicine_name'];
            $f++;
    }
    if($medicine!=$medicine_name){
        $query1=mysqli_query($con,"INSERT INTO `medicine` (`sl`, `medicine_id`, `medicine_name`,`single_price`,`price`) VALUES (NULL, 'med$f', '$medicine_name','$single_price','$price');");
    }else{
        ?>
            <script>
                alert("this medicine already eaxist");
                document.location="medicine.php";
            </script>
        <?php
    }
}
?>
            <script>
                alert(" medicine name submitted ");
                document.location="medicine.php";
            </script>
       