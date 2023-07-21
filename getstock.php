<?php
include("connection.php");

$med=$_REQUEST['med'];

if( $med!=''){
    $q3=" and product_id='$med'";
}
else{
    $q3='';
}
?>
<table border="2">
    <tr>
        <td>date</td>
        <td>purchase id</td>
        <td>sale id</td>
        <td>in</td>
        <td>out</td>
    </tr>
    <?php
        $query=mysqli_query($con,"select * from stock where sl>0".$q3);
        $inn=0;
        $oout=0;
        $sum=0;
        while($result=mysqli_fetch_assoc($query)){
            $date=$result['date'];
            $in=$result['in'];
            $out=$result['out'];
            $purchase_id=$result['purchase_id'];
            $sale_id=$result['sale_id'];
            $inn=$inn+$in;
            $oout=$oout+$out;
            $sum=$inn-$oout;
            ?>
            <tr>
                <td><?php echo $date; ?></td>
                <td><?php echo $purchase_id; ?></td>
                <td><?php echo $sale_id; ?></td>
                <td><?php echo $in; ?></td>
                <td><?php echo $out; ?></td>
            </tr>
            <?php
        }
    ?>
    <tr>
        <td style="background-color:black;color:white; text-align:center;" colspan="5">result</td>
    </tr>
    <tr>
        <td>total in : </td>
        <td colspan="4"><?php echo $inn; ?></td>
    </tr>
    <tr>
        <td>total out : </td>
        <td colspan="4"><?php echo $oout; ?></td>
    </tr>
    <tr>
        <td>current stock : </td>
        <td colspan="4"><?php
        if($sum<0){
            echo "currently the stock is zero";
        }else{
        echo $sum; 
        }
        ?></td>
    </tr>
</table>