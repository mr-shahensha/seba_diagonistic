<?php
include("connection.php");
if(isset($_POST['submit'])){

    $uname=$_POST['username'];
    $pass=$_POST['password'];
    if(isset($_REQUEST['checkbox'])){
        $checkbox=$_REQUEST['checkbox'];
    }else{
        $checkbox="";
    }


/*
    if(isset($_COOKIE['rememberCookieUname'])){
        $uname=$_COOKIE['rememberCookieUname'];
    }else{
        $uname=$_REQUEST['username'];
    }
    if(isset($_COOKIE['rememberCookiePassword'])){
        $pass=$_COOKIE['rememberCookiePassword'];
    }else{
        $pass=$_REQUEST['password'];
    }
    if(isset($_REQUEST['checkbox'])){
        $checkbox=$_REQUEST['checkbox'];
    }else{
        $checkbox="";
    }*/

    $query=mysqli_query($con,"select * from login where user_name='$uname'");
    $count=mysqli_num_rows($query);
    if($count>0){

    while($result=mysqli_fetch_assoc($query)){
        $action=$result['action'];
        $db_password=$result['password'];
        $lvl=$result['level'];
    }


        if($pass==$db_password){
            if($action=="0"){
            if($checkbox=='1'){
                setcookie("rememberCookieUname",$uname,(time()+604800));
                setcookie("remmeberCookiePassword",$pass,(time()+604800));
            }
            session_start();
            session_unset();
            $_SESSION['user_name']=$uname;
            $_SESSION['lvl']=$lvl;

            ?>
            <script>
                alert("welcome !!");
                document.location="index.php";
            </script>
            <?php
        }else{
            ?>
              <script>
                alert("your account is corrently deactivate !!");
                document.location="login.php";
            </script>
           
            <?php
        }

        }else
        {
            ?>
            <script>
                    alert("password  or id maybe incurrrect!!");
                document.location="login.php";
                </script>
            <?php
        }
    }else{
        ?>
        <script>
                alert("user not registered!!");
                document.location="login.php";
            </script>
        <?php
    }
}
?>