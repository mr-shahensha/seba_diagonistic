<?php
$server="localhost";
$username="root";
$password="";
$database="seba_diagonistic";
if(!$con=mysqli_connect($server,$username,$password,$database)){
    echo "failed to connect";
}

?>