<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include("connection.php");
session_start();
$uname=$_SESSION['user_name'];
$bill_nm=$_REQUEST['bill'];
$sname_id=$_REQUEST['sname_id'];
$med_id=$_REQUEST['med_nm'];
$aprice=$_REQUEST['aprice'];
$quantity=$_REQUEST['quantity'];
$newprice=$_REQUEST['newprice'];
$f=0;
$query0=mysqli_query($con,"select medicine_id from bill_details where medicine_id='$med_id' and bill_no='0' and entry_by='$uname';");
while($result0=mysqli_fetch_assoc($query0)){
$f++;
}
// $count=mysqli_num_rows($query0);

if($f>0)
{
?>
<b><p style="color :white;">this medicine name is already chosen</p></b><br>
<?php 
}else{
    date_default_timezone_set("asia/kolkata");
    $datetime = date('d/m/Y h:i:s a', time());
$query=mysqli_query($con,"INSERT INTO `bill_details` (`sl`, `bill_no`, `medicine_id`,`per_p`,`quantity`, `total_price`,`entry_by`,`entry_date`) VALUES (NULL, '0', '$med_id', '$aprice', '$quantity','$newprice','$sname_id','$datetime');");
}
?>
 <table border="2">
                <tr >
                    <td colspan="5" style="background-color:white;color:blue;text-align:center;">
                        cart preview
                    </td>
                </tr>
                <tr>
                    <td style="color:brown;"> medicine name</td>
                    <td style="color:brown;">price/peace</td>
                    <td style="color:brown;">quantity</td>
                    <td style="color:brown;">price</td>
                    <td style="color:brown;">delete</td>
                </tr>
                <?php 
                $query1=mysqli_query($con,"SELECT * FROM `bill_details` where bill_no='$bill_nm'");
                $total_price=0;
                while($result=mysqli_fetch_assoc($query1)){
                    $new_medicine_id=$result['medicine_id'];
                    $new_per_p=$result['per_p'];
                    $new_quantity=$result['quantity'];
                    $new_total_price=$result['total_price'];
                    $sl=$result['sl'];

                    $total_price=$total_price+$new_total_price;
                ?>
                <tr>
                    <td style="color:blue;"><?php 
                    $query2=mysqli_query($con,"select medicine_name from medicine where medicine_id='$new_medicine_id'");
                    while($result1=mysqli_fetch_assoc($query2)){
                        $medicine_name=$result1['medicine_name'];
                    }
                    echo $medicine_name;?></td>
                    <td><?php  echo $new_per_p;?></td>
                    <td><?php  echo $new_quantity;?></td>
                    <td><?php  echo $new_total_price;?></td>
                    <td><input type="hidden" name="" id="cart_id<?php echo $sl;?>" value="<?php echo $sl;?>">
                    <div id="deleted_cart"><input type="button" value="deleted" onclick="delete_cart(<?php echo $sl;?>)"></div></td>
                   
                </tr>
                <?php }?>
                <tr>
                    <td style="color:red;">
                        total price
                    </td>
                    <td colspan="3"><?php  echo $total_price;?></td>
                </tr>
                <tr>
                 </table> 
                 <input type="submit" value="submit" name="submit" style="width:300px;background-color:blue;color:white;">
                 <script>
                    function delete_cart(sl){
                        var cart_id=document.getElementById('cart_id'+sl).value;
                        if(confirm("are you sure ?")){
                            $('#deleted_cart').load('delete_cart.php?cart_id='+cart_id).fadeIn('fast');
                        }
                    }
                 </script>