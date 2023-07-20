<?php
include("connection.php");
include("back.php");
$uname=$_SESSION['user_name'];
$lvl=$_SESSION['lvl'];
// $bill_num=str_shuffle("seba123456789");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/index.css">
</head>
<body style="background-color:gray; color:black">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img class="logo" width="50px" src="img/image.png" alt="medical logo" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dwsd.php">dwsd</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pwsd.php">pwsd</a>
        </li>
        <?php 
        if($lvl==0){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="medicine.php">medicine</a>
        </li>
        <?php 
        }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-symbols-outlined">manage_accounts</span>          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
       
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <form action="post.php" method="post">
        
        <table border="2">
            <tr>
                <td>customer name :<input type="text" placeholder=" enter customer name" name="customer_name" id="customer_id" onkeyup="hidewarn(this.value)"></td>
                <td colspan="2">doctor name : <input type="text" placeholder=" enter customer name" name="doctor_name" id="doctor_id" onkeyup="hidewarn2(this.value)"></td>
            </tr>
            <tr>
                <td >medicine name : <select name="" id="med" onchange="fun(this.value)">
                    <option value="">select</option>
                    <?php 
                    $query=mysqli_query($con,"select * from medicine"); 
                    while($result=mysqli_fetch_assoc($query)){
                        $medicine_id=$result['medicine_id'];
                        $medicine_name=$result['medicine_name'];
                        ?>
                        <option value="<?php echo $medicine_id;?>"><?php echo $medicine_name;?></option>
                        <?php
                    }
                    ?>
                </select>
                </td>
                <td colspan="2">
                 Number of medicines : <div id="check">  <select name="" id="">
                    <option value="">quantity</option>
                 </select>  </div>
                   
                </td>
               
            </tr>
            <tr>
            <td>
                    quantity : <input type="text" value="" placeholder="enter quanity" id="quantity" onkeyup="quan(this.value)">
                </td>
                <td>
                    total price  :  <div id="totalp">000</div> 
                </td>
                <td>
                 <button onclick="return validation()" type="button" name="b1" id="b1" >cart</button>
                </td>
            </tr>
        </table>
        <br>
        <p id="warn" style="color:red;"></p>
        <br>
             <div id="cart_table">
                        no data to preview
             </div>
       </form> 
</body>
</html>
<script>

    function fun(a){
        $('#check').load('getcheck.php?a='+a).fadeIn('fast');
        }
		
       function quan(a){
            var  aprice=parseInt(document.getElementById("aprice").value);
            var newa=parseInt(a);
            var newprice=newa*aprice;
            $('#totalp').load('totalp.php?newprice=' + newprice, function() {
                $(this).fadeIn('fast');
            });
			
        }
        function validation(){
            var customer_id=document.getElementById('customer_id').value;
            var doctor_id=document.getElementById('doctor_id').value;
            if(customer_id.length<3){
                text="please enter customer name";
                document.getElementById('warn').innerHTML=text;
                return false;
            }
            if(doctor_id.length<3){
                text="please enter doctor name";
                document.getElementById('warn').innerHTML=text;
                return false;
            }
            cart();
        }
    function cart(){
        var bill=0;
        var sname_id=document.getElementById('sname_id').value;
        var med_nm=document.getElementById('med').value;
        var aprice=document.getElementById('aprice').value;
        var quantity=document.getElementById('quantity').value;
        var newprice=document.getElementById('newprice').value;

        $('#cart_table').load('cart.php?bill=' + bill+'&med_nm='+med_nm+'&aprice='+aprice+'&quantity='+quantity+'&newprice='+newprice+'&sname_id='+sname_id).fadeIn('fast');

        $('#check').load('getcheck.php?a=').fadeIn('fast');
        document.getElementById('quantity').value="";
        document.getElementById('med').value="";
        $('#totalp').load('totalp.php?newprice=', function() {
                        $(this).fadeIn('fast');
                    });
        }

        function hidewarn(a){
        if(a!=''){
            document.getElementById("warn").innerHTML = "";
        }
        }
        function hidewarn2(a){
            if(a!=''){
            document.getElementById("warn").innerHTML = "";
            }
        }
</script>