<?php
include("templates/conn.php");
include("templates/function.php");

    unset ($_SESSION['USER_LOGIN']);
    unset ($_SESSION['USER_ID']);
    
    header("location:login.php");
    die();
?>