<?php
include("connection.php");
$bill_nm=$_REQUEST['bill'];
$med_nm=$_REQUEST['med_nm'];
$aprice=$_REQUEST['aprice'];
$quantity=$_REQUEST['quantity'];
$newprice=$_REQUEST['newprice'];


?>


 <table border="2">
                <tr >
                    <td colspan="3" style="background-color:white;color:blue;">
                        cart preview
                    </td>
                </tr>
                <tr>
                    <td>
                        bill number
                    </td>
                    <td colspan="2"><?php echo $bill_nm;?></td>
                </tr>
                <tr>
                    <td>medicine name</td>
                    <td>no of medicine</td>
                    <td>quantity</td>
                </tr>
                <tr>
                    <td>0000</td>
                    <td>0000</td>
                    <td>0000</td>
                </tr>
                <tr>
                    <td>
                        total price
                    </td>
                    <td colspan="3">***</td>
                </tr>
             </table> 