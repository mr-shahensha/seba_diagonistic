<?php
include("connection.php");
$bill_nm=$_REQUEST['bill'];
$sname_id=$_REQUEST['sname_id'];
$med_id=$_REQUEST['med_nm'];
$aprice=$_REQUEST['aprice'];
$quantity=$_REQUEST['quantity'];
$newprice=$_REQUEST['newprice'];

$query=mysqli_query($con,"INSERT INTO `bill_details` (`sl`, `bill_no`, `medicine_id`,`per_p`,`quantity`, `total_price`,`entry_by`) VALUES (NULL, '0', '$med_id', '$aprice', '$quantity','$newprice','$sname_id');");

?>


 <table border="2">
                <tr >
                    <td colspan="4" style="background-color:white;color:blue;">
                        cart preview
                    </td>
                </tr>
                <tr>
                    <td>medicine name</td>
                    <td>price/peace</td>
                    <td>quantity</td>
                    <td>price</td>
                </tr>
                <?php 
                $query1=mysqli_query($con,"SELECT * FROM `bill_details` where bill_no='$bill_nm'");
                $total_price=0;
                while($result=mysqli_fetch_assoc($query1)){
                    $new_medicine_id=$result['medicine_id'];
                    $new_per_p=$result['per_p'];
                    $new_quantity=$result['quantity'];
                    $new_total_price=$result['total_price'];

                    $total_price=$total_price+$new_total_price;
                ?>
                <tr>
                    <td><?php  echo $new_medicine_id;?></td>
                    <td><?php  echo $new_per_p;?></td>
                    <td><?php  echo $new_quantity;?></td>
                    <td><?php  echo $new_total_price;?></td>
                </tr>
                <?php }?>
                <tr>
                    <td>
                        total price
                    </td>
                    <td colspan="3"><?php  echo $total_price;?></td>
                </tr>
                <tr>
                 </table> 