<?php
    session_start();
    // $_POST = array_map('htmlspecialchars', $_POST);
    $username = @$_SESSION['username'];

    if ($_SESSION['username'] == 'admin') {
        $username = "<b style='color: #31a2d6'>alex🍆:</b>";
    } else {
        $username = "<b style='color: pink'>valentina❀:</b>";
    }
    
    $dateiname = "./chat.txt";
    if ($_POST['gesendet']) {
        $datei = fopen($dateiname, "a");
        flock($datei, LOCK_EX);

        $date = date('(H:i) ');
        if (filesize($dateiname) < 3) {
            fputs($datei, "<span style='font-size: x-small'>".$date."</span>".$username." ".$_POST['message']."\n\n");
        } else {
            fputs($datei, "<br><span style='font-size: x-small'>".$date."</span>".$username." ".$_POST['message']."\n\n");
        }

        flock($datei, LOCK_UN);
        fclose($datei);
        header("Location: ./chat.php");
    } else {
        header("Location: ./chat.php");
    }
?>