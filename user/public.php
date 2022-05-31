<?php
session_start();

$_SESSION['user'] = "pastapublica";

header("location: index.php");
?>