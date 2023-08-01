<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <title>login Tabelle erstellen</title>
</head>
<body>
<?php
    if (!isset($_GET['check'])) {
        header("Location: ./index.php");
    }
    include("../inc/db_init.php");

    $sql = 'DROP TABLE IF EXISTS alexglaserLogin';
    $erg = mysqli_query($link, $sql);

    // Tabelle für den Login
    $sql_cre = 'CREATE TABLE IF NOT EXISTS alexglaserLogin (
                username varchar(20) NOT NULL PRIMARY KEY,
                pwd char(60) NOT NULL
                )';

    if (mysqli_query($link, $sql_cre))
        echo "<h2 style='color: green;'>Login Tabelle wurde angelegt</h2>";
    else
        echo "<h2 style='color: red;'>Beim anlegen von der Login-Tabelle ist etwas schief gelaufen</h2>";

    // Benutzer für die Login-Tabelle hinzufügen
    $adminpwd = file_get_contents("https://".$_SERVER['SERVER_NAME']."/administration/adminpwd.txt");
    $adminpwdhash = password_hash($adminpwd, PASSWORD_BCRYPT);
    $valentinapwdhash = password_hash('Schminktisch14', PASSWORD_BCRYPT);
    $insertLog = "INSERT INTO alexglaserLogin VALUES ('admin', '".$adminpwdhash."'), ('valentina', '".$valentinapwdhash."')";
        
    if(mysqli_query($link,$insertLog))
        echo "<hr><b style='color: green;'>Benutzer wurden erfolgreich hinzugefügt</b><hr>";
    else
        echo "<hr><b style='color: red;'>Fehler Aufgetreten</b><hr>";
?>
</body>
</html>