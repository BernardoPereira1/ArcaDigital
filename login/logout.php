<?php
    session_start();
    $alogout = $_GET['logout'];
    if ($alogout == 'admin'){
        unset($_SESSION['admin']);

        header("location: login.php");
} else {
        unset($_SESSION['user']);

        header("location: login.php");
    }

   
?>