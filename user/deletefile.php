<?php
$file = $_GET['item'];
unlink("$file");
header("Refresh:0; url=index.php");
?>
