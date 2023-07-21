<?php
include("connection.php");

$med=$_REQUEST['med'];

if( $med!=''){

?>
<table border="2">
    <tr>
        <td>sl</td>
        <td>date</td>
        <td>in</td>
        <td>out</td>
        <td>stock</td>
    </tr>
    <?php
    $f=0;
        $query=mysqli_query($con,"select * from stock where sl>0 and product_id='$med'");
        
        while($result=mysqli_fetch_assoc($query)){
            $sl=$result['sl'];
            $date=$result['date'];
            $in=$result['in'];
            $out=$result['out'];
            $purchase_id=$result['purchase_id'];
            $sale_id=$result['sale_id'];
            
            $f++;
            ?>
            <tr>
                <td><?php echo $f; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $in; ?></td>
                <td><?php echo $out; ?></td>
                <td><?php
                $sum=0;
                    $query=mysqli_query($con,"select * from stock where sl>0 and sl='$sl'");
                    while()
                
                echo $sum=$in-$out;; ?></td>
            </tr>
            <?php
        }
    ?>

</table>

<?php
}
?>