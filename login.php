<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <!-- This is header -->
    <header>
        <div class="logo"><img src="img/image.png" alt="medical logo" width="100px"></div>
        <h1>Seba diagonistic centre</h1>
    </header>
<!-- login form-->
<form action="logic.php" method="post">
    <section class="box">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">login id</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll share your id with everyone.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1" value="1" id=""> 
    <label class="form-check-label" for="exampleCheck1">remember me</label>
  </div>
  <input type="submit" value="login" name="submit"  class="btn btn-primary">
  </section>
</form>
</body>
</html>
