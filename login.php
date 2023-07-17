<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <!-- This is header -->
    <header>
        <div class="logo"><img src="img/image.png" alt="medical logo" width="100px"></div>
        <h1>Seba diagonistic centre</h1>
    </header>
    <!-- This is hero section -->

    <form action="logic.php" method="post">

    <div class="flex-container">
        <input type="text" value="" placeholder="enter your username" name="username" id="username_id">
        <input type="text" placeholder="enter your password" name="password" id="password_id">
        <input type="submit" value="login" name="submit">
    <div class="check">
    <input type="checkbox" name="checkbox" value="1" id="">remember me
    </div>
        
        </div>
</form>
</body>
</html>
