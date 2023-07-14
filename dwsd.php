<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
    <table border="2">
    <tr>
        <td>date1 : <input type="date" name="" id="date1"></td>
        <td>date2 : <input type="date" name=""  id="date2"></td>
        <td><select name="" id="admin">
            <option value="">all admin</option>
            <?php
            $query=mysqli_query($con,"select * from login");
            while($result=mysqli_fetch_assoc($query)){
                $user=$result['user_name'];
                ?>
                <option value="<?php echo $user;?>"><?php echo $user;?></option>
                <?php
            }
            ?>
        </select></td>
        <td><button type="button" onclick="search()" style="color:blue;">search</button></td>
    </tr>
    </table>
            <br>
            <div class="search">
                serch result
            </div>
</body>
</html>
<script>
    function search(){
        var date1=document.getElementById('date1').value;
        var date2=document.getElementById('date2').value;
        var admin=document.getElementById('admin').value;
        if(date1==""){
            alert("select a date")
        }
        alert(admin)
        $('#search').load('getdwsd.php?date1=' + date1+'&date2='+date2+'&admin='+admin).fadeIn('fast');
    }
</script>