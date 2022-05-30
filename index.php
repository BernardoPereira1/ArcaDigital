<?php
session_start();
if (isset($_SESSION['user'])) {
?>

    <script>
        function uploadfiles() {
            <?php
            $user = $_SESSION['user'];
            $target_path = "PastasUtilizadores/$user/";
            $path = "PastasUtilizadores/$user/";

            $target_path = $target_path . basename($_FILES['uploadedfile']['name']);

            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                echo "The file " . basename($_FILES['uploadedfile']['name']) .
                    " has been uploaded <br/><br/>";

                $files = array_diff(scandir($path), array('.', '..'));

                $num = count($files);
                echo $num . "<br/><br/>";

                for ($i = 2; $i < $num + 2; $i++) {
                    // Substituir a localização dos ficheiros para o servidor local
                    echo "<a href='http://localhost:8080/aula09/PL9/LoadedFiles/$files[$i]'>$files[$i]</a><br/>";
                }
            } else {
                echo "There was an error uploading the file, please try again!";
            }
            ?>
        }
    </script>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/f23df08e10.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <title>Arca Digital</title>
    </head>

    <body>
        <div class="w3-teal">
            <img class="logo" src="imagens/logo.png" alt="logo">
            <div class="w3-container">
                <a href="logout.php?logout">Logout</a>
            </div>
        </div>


        <br>
        <form onsubmit="uploadfiles()" id="uploadfile" enctype="multipart/form-data" action="index.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <div class="input-group" style="max-width: 50%;margin-left: auto;margin-right: auto;">
                <input name="uploadedfile" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" form="uploadfile" type="submit" id="inputGroupFileAddon04">Enviar Ficheiro</button>
            </div>
        </form>

        <br>
        <table class="table" style="max-width: 75%;margin-left: auto;margin-right: auto;">
            <tbody>
                <tr>
                    <td>
                        <h4>Lista de ficheiros</h4>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php
        $path = "PastasUtilizadores/$user/";
        $dh = opendir($path);
        $i = 1;
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
        ?>
                <table class="table" style="max-width: 75%;margin-left: auto;margin-right: auto;">
                    <tbody>

                        <tr>
                            <td colspan="2" class="table-active"><?php echo "<a $path/$file>$file</a><br /><br />";
                                                                    $i++; ?></td>
                            <td>
                                <button type="button" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i><?php echo "<a style='color:white; text-decoration: none' href='$path/$file' download> Descarregar</a>" ?></button>
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-file-arrow-down"></i><?php echo "<a style='color:white; text-decoration: none' href='deletefile.php?item=$path/$file'> Apagar</a>" ?></button>
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
    header("location: login.php");
}
?>

    </html>