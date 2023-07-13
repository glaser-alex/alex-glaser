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
    <title>Registrieren</title>
  </head>
  <body class="body">
  <?php
    $_POST = array_map('htmlspecialchars', $_POST);
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $submit = @$_POST['submit'];

    if (isset($submit)) {
      try {
        require("../inc/db_init.php");
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO alexglaserLogin VALUES (\"$username\", \"$passwordhash\")"; 
        mysqli_query($link, $sql);
        header("Location: ./index.php?u=$username&p=$password");
      } catch (Exception $e) {
        echo "
        <body class='body'>
        <div class='center'>
          <h1>Registrieren</h1>
          <form action='./signup.php' method='POST'>
          <div style='text-align: center; color: lime;'>Keine Werbung</div>
            <div class='txt_field'>
              <input type='text' name='username' required autofocus>
              <span></span>
              <label>Username</label>
            </div>
            <div class='txt_field'>
              <input type='password' name='password' required>
              <span></span>
              <label>Password</label>
            </div>
            <input type='submit' name='submit' value='Signup'>
            <div class='signup_link'><h4 style='color: red;'>Username schon vergeben</h4></div>
            <div class='signup_link'>
              Zurück zum <a href='./index.php'>Login</a>
            </div>
          </form>
        </div>
        ";
        exit();
      }
    }
  ?>
    <div class="center">
      <h1>Registrieren</h1>
      <form action="./signup.php" method="POST">
        <div style="text-align: center; color: lime;">Keine Werbung</div>
        <div class="txt_field">
          <input type="text" name="username" required autofocus>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="submit" value="Signup">
        <div class='signup_link'>
          Zurück zum <a href='./index.php'>Login</a>
        </div>
      </form>
    </div>
  </body>
</html>