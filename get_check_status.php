<?php
include("connection.php");

$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
$medicine=$_REQUEST['medicine'];


if($date1!='' && $date2!='' ){
    $q2=" and date between '$date1' and '$date2'";
 }
 else{
     $q2='';
 }
 if( $medicine!=''){
     $q3=" and product_id='$medicine'";
 }
 else if( $medicine=='a'){
     $q3='';
 }
 

if( $medicine=='a'){ 

?>
<table border="2">
    <tr>
        <td><b>sl</b> </td>
        <td><b>date</b> </td>
        <td><b>product</b> </td>
        <td><b>stock</b> </td>
    </tr>
        <?php
        $f=0;
            $query=mysqli_query($con,"select  distinct product_id,date from stock");
            while($result=mysqli_fetch_assoc($query)){
                $product_id=$result['product_id'];
                $date=$result['date'];
                $f++;
                ?>
                <tr>
                <td><?php echo $f;?></td>
                <td><?php echo $date;?></td>

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
}else { 

$opbl=0;
    $query0=mysqli_query($con,"select sum(inn-outt) as opn_stk from stock where sl>0 and date <'$date1' and product_id='$medicine'");

    while($result0=mysqli_fetch_assoc($query0)){
        $opbl=$result0['opn_stk'];
   }
	
	if($opbl==""){$opbl=0;}
    ?>
        <table border="2">
            <tr>
                <td><b>sl</b> </td>
                <td><b>date</b> </td>
                <td><b>in</b> </td>
                <td><b>out</b> </td>
                <td><b>stock</b> </td>
            </tr>
			    <tr>
                <td colspan="4"><b>Opening stock :</b> </td>
                <td><b><?php echo $opbl;?></b> </td>
             
            </tr>
			
			
            <?php
            $f=0;
			 $nbal=$opbl;

            $query2=mysqli_query($con,"select * from stock where sl>0".$q2.$q3." order by date");
            $total=0;
            while($result2=mysqli_fetch_assoc($query2)){
                $date2=$result2['date'];
                $inn=$result2['inn'];
                $outt=$result2['outt'];

     if($inn>0){       
  $nbal=$nbal+$inn;//50+10=60
	 }
	     if($outt>0){   
  $nbal=$nbal-$outt;//50-10=40
		 }


                $f++;
                ?>
                 <tr>
                <td><?php echo $f;?></td>
                <td><?php echo $date2;?></td>
                <td><?php echo $inn;?></td>
                <td><?php echo $outt;?></td>
                <td><?php echo $nbal;?></td>
            </tr>
                <?php 
            }
                ?>
        </table>

<?php
}
?>