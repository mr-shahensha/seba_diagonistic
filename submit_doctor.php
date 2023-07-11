<?php
include("connection.php");
if(isset($_POST['submit'])){
    $doctor_name=$_REQUEST['doctor_name'];
    $query=mysqli_query($con,"select * from doctor");
    $f=0;
    while($result=mysqli_fetch_assoc($query)){
        $doctor=$result['doctor_name'];
            $f++;
    }
    if($doctor!=$doctor_name){
        $query1=mysqli_query($con,"INSERT INTO `doctor` (`sl`, `doctor_id`, `doctor_name`) VALUES (NULL, 'doc$f', '$doctor_name');");
    }else{
        ?>
            <script>
                alert("this doctor already eaxist");
                document.location="doctor.php";
            </script>
        <?php
    }
}
?>
            <script>
                alert(" doctor name submitted ");
                document.location="doctor.php";
            </script>
       