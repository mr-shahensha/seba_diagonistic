<?php
include("connection.php");

session_Start();
session_unset();
session_destroy();
// setcookie('cunm',"",(time()+604800));

// setcookie('cups',"",(time()+604800));
?>
<script language="javascript">
    alert("logout succesfully")
document.location="login.php";
</script>
<?php

?>