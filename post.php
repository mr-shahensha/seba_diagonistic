<?php
include("connection.php");
if(isset($_POST['submit'])){
    $billno=$_REQUEST['bill_no'];
    $customer_name=$_REQUEST['customer_name'];
    $doctor_name=$_REQUEST['doctor_name'];

}
?>
<form action="gopost.php" method="post">
<table border="2">
    <tr >
        <th style="color:blue" colspan="4">Prescription</th>
    </tr>
    <tr>
        <td><b>bill no : </b> </td>
        <td colspan="3"><input type="text" value="<?php echo $billno;?>" readonly name="billno">
        </td>
    </tr>
    <tr>
        <td><b>customer name : </b> </td>
        <td><input type="text" value="<?php echo $customer_name;?>" readonly name="cust_name"></td>
        <td><b>doctor name : </b> </td>
        <td><input type="text" value="<?php echo $doctor_name;?>" readonly name="doctor_name"></td>
    </tr>
   <tr>
    <th colspan="4" style="color:green;">*****Billing*****</th>
   </tr>

    <tr>
        <td><b> medicine name</b> </td>
        <td><b> Number of medicines</b> </td>
        <td><b> quantity </b></td>
        <td><b>total price </b> </td>
    </tr>
    <?php
        $query=mysqli_query($con,"SELECT * FROM `bill_details` where bill_no='$billno'");
        $amount=0;
        while($result=mysqli_fetch_assoc($query)){
            $medicine_id=$result['medicine_id'];
            $per_p=$result['per_p'];
            $quantity=$result['quantity'];
            $total_price=$result['total_price'];
        $amount=$amount+$total_price;
    ?>
        <td><?php 
        $query2=mysqli_query($con,"select medicine_name from medicine  where medicine_id='$medicine_id'");
        while($result2=mysqli_fetch_assoc($query2)){
            $medicine_name=$result2['medicine_name'];
        }
        
        echo $medicine_name; ?></td>
        <td><input type="text" value="<?php echo $per_p; ?>" readonly name="per_p">    
        </td>
        <td><input type="text" value="<?php echo $quantity; ?>" readonly name="quantity">
        </td>
        <td><input type="text" value="<?php echo $total_price; ?>" readonly name="total_price">
        </td>
        <tr>
    <?php 
        }
    ?>


    </tr>

    <tr>
        <td colspan="2">
           <b>Total bill amount : </b> 
        </td>
        <td colspan="2"><input type="text" value="<?php echo $amount;?>" readonly name="amount">
        </td>
    </tr>

    <tr><th colspan="4"><input style="width:300px;background-color:blue;color:white;" type="submit" value="Pay now" name="submit"></th></tr>
</table>
</form>