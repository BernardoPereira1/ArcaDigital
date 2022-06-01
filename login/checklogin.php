<?php
include('../config.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

$user = $_POST["user"];
$password = $_POST["password"];
$sql = "SELECT id, user, password FROM utilizadores WHERE user='$user' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  if ($user=="admin"){
        $_SESSION['admin'] = $_POST['user'];
        header("location: ../admin/adminhome.php");
  } else {

    $_SESSION['user'] = $_POST['user'];
    header("location: ../user/index.php");
  }
}else {
  echo "<br><h2 style='text-align:center'>Utilizador ou password inválidos, por favor tente novamente!</h2>";
  header("Refresh:5; url=login.php");
}

mysqli_close($conn);
?>