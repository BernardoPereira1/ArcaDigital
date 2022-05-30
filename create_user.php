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

$user = $_POST['user'];
$password = $_POST['password'];
$sql = "INSERT INTO utilizadores (user, password)
VALUES ('$user', '$password')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['user']=$_POST['user'];
    if (!file_exists('PastasUtilizadores/'.$user)){
        mkdir('PastasUtilizadores/'.$user, 0777, true);
    }
    echo "<br><h2 style='text-align:center'>A conta foi criada com sucesso!</h2>";
    ?>
        <meta http-equiv="refresh" content="1;url=index.php">
    <?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>