<?php
include("connection.php");

session_Start();
session_unset();
session_destroy();
setcookie('rememberCookieUname',"",(time()+604800));

setcookie('rememberCookiePassword',"",(time()+604800));
?>
<script language="javascript">
    alert("logout succesfully")
document.location="login.php";
</script>
<?php

?>