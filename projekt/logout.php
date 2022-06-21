<?php
session_start();
$_SESSION['loggedin'] = FALSE;
unset($_SESSION["id"]);
unset($_SESSION["username"]);
session_destroy();
header("Location:login.php");
?>