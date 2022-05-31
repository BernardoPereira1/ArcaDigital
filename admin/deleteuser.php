<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcadigital";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

$user = $_GET['user'];
$path = $_GET['path'];

rmdir($path.'/'.$user);
$sql = "DELETE FROM utilizadores WHERE user='$user'";
$result = mysqli_query($conn, $sql);
header("Refresh:0; url=adminhome.php");

mysqli_close($conn);
?>


