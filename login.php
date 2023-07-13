<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>login page </h1>
    <form action="logic.php" method="post" onsubmit="return validation()">
    <table border="2">
        <tr>
            <td><input type="text" value="" placeholder="enter your username" name="username" id="username_id"></td>
        </tr>
        <tr>
            <td><input type="password" placeholder="enter your password" name="password" id="password_id"></td>
        </tr>
        <tr>
            <td><input type="submit" value="login" name="submit"></td>
        </tr>
    </table>
    <input type="checkbox" name="checkbox" value="1" id="">remember me
    </form>
</body>
</html>
<script>
     function validation(){
        var uname_id=document.getElementById('username_id').value;
        var pass_id=document.getElementById('password_id').value;

        // if(uname_id.length<3){
        //     text="please enter username";
        //     document.getElementById("warn").innerHTML = text;
        //         return false;
        // }
        // if(pass_id.length<3){
        //     text="please enter password";
        //     document.getElementById("warn2").innerHTML = text;
        //         return false;
        // }
    }
</script>