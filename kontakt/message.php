<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->

<?php
  // Email für den empfänger
  $_POST = array_map('htmlspecialchars', $_POST);
  $betreff = "Danke für Ihre Nachricht";
  $from = "From: Alex Glaser <kontakt@alex-glaser.de>\r\n";
  $from .= "Reply-To: kontakt@alex-glaser.de\r\n";
  $from .= "Content-Type: text/html\r\n";
  $vname = @$_POST['vname'];
  $nname = @$_POST['nname'];
  $anrede = @$_POST['anrede'];
  $firma = @$_POST['firma'];
  $empfaenger = @$_POST['email'];
  $vorwahl = @$_POST['land'];
  $tel = @$_POST['tel'];
  $message = @$_POST['message'];
  $gesendet = @$_POST['gesendet'];
  $datenschutz = @$_POST['datenschutz'];
    if ($_COOKIE['consent'] == 'all') {
        setcookie('vname', $vname); setcookie('nname', $nname);
    }

//   echo"<pre>";print_r($_POST);echo"</pre>";
if (!$gesendet) {
    header("Location: https://$_SERVER[SERVER_NAME]/kontakt");
} else {
    if (!empty($vname) && !empty($nname) && !empty($anrede) && !empty($empfaenger) && !empty($message) && !empty($datenschutz)) {
        
        $datum = date("d.m.Y");
        $uhrzeit = date("H:i:s");
        $dateiname = '../administration/message.txt';
        $message = "\n\n";
        if (!file_exists($dateiname)) {
            $dateizeiger = fopen($dateiname, 'w+');
        } else {
            $dateizeiger = fopen($dateiname, 'a');
        }
        flock($dateizeiger, LOCK_EX);
        // If all Cookies accept
        if ($_COOKIE['consent'] == 'all') {
            $ip = $_SERVER["REMOTE_ADDR"];
            $hostname = getHostByAddr($_SERVER["REMOTE_ADDR"]);

            $message .= "Hostname:\t$hostname\nIp:\t\t$ip\n";
        }
        $message .= "Datum:\t\t$datum\nUhrzeit:\t$uhrzeit\nVorname:\t$vname\nNachname:\t$nname\nMessage:\n$message";
        fputs($dateizeiger, $message);
        flock($dateizeiger, LOCK_UN);
        fclose($dateizeiger);
        
        // Email für den empfänger
        $dateiname = "../inc/autoMail.html";
        $dateizeiger = fopen($dateiname, 'r');
        rewind($dateizeiger);
        $msg = $anrede . " " . $vname . " " . $nname . ",\n\n";
        $msg .= fread($dateizeiger, filesize($dateiname));
        fclose($dateizeiger);


        if (mail($empfaenger, $betreff, $msg, $from)) {
            echo "Empfänger E-Mail wurde erfoglreich gesendet<br>";
        } else {
            echo "<b style='color: red;'>Fehler beim senden der Email</b><br>";
        }


        // Email für den Host
        $empfaenger = "kontakt@alex-glaser.de";
        $betreff = "Nachricht von " . $vname . " " . $nname;
        $from = "From: " . $vname . " " . $nname . " <kontakt@alex-glaser.de>\r\n";
        $from .= "Reply-To: " . $empfaenger . "\r\n";
        $from .= "Content-Type: text/html\r\n";
        $msg = $message;
        $msg .= "<br><br>Tel: $vorwahl $tel<br>";
        $msg .= "Firma: $firma";
            
        if (mail($empfaenger, $betreff, $msg, $from)) {
            echo "Host E-Mail wurde erfoglreich gesendet<br>";
        } else {
            echo "<b style='color: red;'>Fehler beim senden der Email</b><br>";
        }

        header("Location: ".$_SERVER['SERVER_NAME']."");

    } else {
        echo "<b style='color: red;'>Allgemeiner Fehler</b><br>";
    }
}
?>