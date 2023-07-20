<?php 
include("connection.php");
$medicine=$_REQUEST['med'];
$f=0;
$query0=mysqli_query($con,"select * from medicine_master");
while(mysqli_fetch_assoc($query0)){
    $f++;
}
$query=mysqli_query($con,"INSERT INTO `medicine_master` (`sl`, `medicine_master_id`, `medicine_master_name`) VALUES (NULL, 'med$f', '$medicine');");
$query1=mysqli_query($con,"INSERT INTO `medicine` (`sl`, `medicine_id`, `medicine_name`) VALUES (NULL, 'med$f', '$medicine');");
?>
<p style="color:green;">data sented</p>

<table border="2">
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
</table>