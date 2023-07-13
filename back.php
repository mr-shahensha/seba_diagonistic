<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user_name'])){
    die(header("location:login.php"));
}
?>