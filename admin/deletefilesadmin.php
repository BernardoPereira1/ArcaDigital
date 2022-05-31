<?php
$file = $_GET["file"];
$path = $_GET["path"];
$user = $_GET["user"];

unlink($path.$file);
header("Refresh:0; url=adminver.php?user=$user");
?>