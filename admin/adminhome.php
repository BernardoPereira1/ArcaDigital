<?php
session_start();
if (isset($_SESSION['admin'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../styles.css">
        <script src="https://kit.fontawesome.com/f23df08e10.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <title>Arca Digital</title>
    </head>

    <body>
        <div class="w3-teal">
            <img class="logo" src="../imagens/logo.png" alt="logo">
            <div class="w3-container">
                <a href="../login/logout.php?logout=admin">Logout</a>
            </div>
        </div>

        <br>
        <table class="table" style="max-width: 75%;margin-left: auto;margin-right: auto;">
            <tbody>
                <tr>
                    <td>
                        <h4>Lista de Utilizadores</h4>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php
        $path = "../PastasUtilizadores/";
        $dh = opendir($path);
        $i = 1;
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin" && $file != "admin") {
        ?>
                <table class="table" style="max-width: 75%;margin-left: auto;margin-right: auto;">
                    <tbody>

                        <tr>
                            <td style="text-align:center" colspan="2" class="table-active"><?php echo "<a $path/$file>$file</a><br /><br />";
                                                                                            $i++; ?></td>
                            <td>
                                <button type="button" class="btn btn-success"><i class="fa-solid fa-folder-open"></i><?php echo "<a style='color:white; text-decoration: none' href='adminver.php?user=$file'> Abrir Pasta</a>" ?></button>
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><?php echo "<a style='color:white; text-decoration: none' href='deleteuser.php?path=$path&user=$file'> Apagar Utilizador</a>" ?></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        <?php
            }
        }
        closedir($dh);
        ?>


    </body>


<?php
} else {
    echo "<br><h2 style='text-align:center'>Esta página pertence ao administrador, por favor faça login na conta do mesmo para aceder!</h2>";
    header("Refresh:5; url=../login/login.php");
}
?>

    </html>