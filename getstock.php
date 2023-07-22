<?php
include("connection.php");
$med=$_REQUEST['med'];

if( $med=='a'){ 
?>
<table border="2">
    <tr>
        <td><b>sl</b> </td>
        <td><b>product</b> </td>
        <td><b>stock</b> </td>
    </tr>
        <?php
        $f=0;
            $query=mysqli_query($con,"select distinct product_id from stock");
            while($result=mysqli_fetch_assoc($query)){
                $product_id=$result['product_id'];
                $f++;
                ?>
                <tr>
                <td><?php echo $f;?></td>
                <td>
                
                <?php
                 $query2=mysqli_query($con,"select medicine_name from medicine where medicine_id='$product_id'");
                 while($result1=mysqli_fetch_assoc($query2)){
                     $medicine_name=$result1['medicine_name'];
                 }
                echo $medicine_name;?></td>
                <td>
                <?php
                  $query1=mysqli_query($con,"select sum(inn) as total_in , sum(outt) as total_out from stock where product_id='$product_id'");
                  $sum=0;
                  while($result1=mysqli_fetch_assoc($query1)){
                      $inn=$result1['total_in'];
                      $oout=$result1['total_out'];
                      $sum=$inn-$oout;
                    }
                    echo $sum;
                ?>
                </td>
                </tr>
                <?php
            }
        ?>

</table>

<?php
}else if( $med!='a'){
    ?>
        <table border="2">
            <tr>
                <td><b>sl</b> </td>
                <td><b>date</b> </td>
                <td><b>in</b> </td>
                <td><b>out</b> </td>
                <td><b>stock</b> </td>
            </tr>
            <?php
            $f=0;
            $query2=mysqli_query($con,"select * from stock where product_id='$med'");
            $total=0;
            while($result2=mysqli_fetch_assoc($query2)){
                $sll=$result2['sl'];
                $date=$result2['date'];
                $inn=$result2['inn'];
                $outt=$result2['outt'];
                $total=($total+$inn)-$outt;
                $f++;
                ?>
                 <tr>
                <td><?php echo $f;?></td>
                <td><?php echo $date;?></td>
                <td><?php echo $inn;?></td>
                <td><?php echo $outt;?></td>
                <td><?php echo $total;?></td>
            </tr>
                <?php 
            }
                ?>
        </table>

<?php
}
?>