<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <link rel="stylesheet" href="./css/burger.css" type="text/css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Chat</title>
  <style>
        @font-face {
            font-family: Ubuntu;
            src: url(../font/Ubuntu/Ubuntu-Light.ttf);
        }
        html {
            width: 100%;
            height: 100%;
            font-family: Ubuntu, Arial, sans-serif;
            font-style: normal;
        }

        .the-box {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .the-title {
            padding: 5px;
            font-size: 3em;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    session_start();
    include("./inc/nav.php");
    
    if ($_SESSION['login']) {
      if ($_SESSION['username'] != 'admin' && $_SESSION['username'] != 'valentina') {
        echo "<div class='the-box'>";
          echo "<div class='the-title'>Du hast keine Berechtigung</div>";
        echo "</div>";
        exit();
      } else {
        header("Location: ./chat.php");
      }
    } else {
      header("Location: ../login?location=chat");
    }
?>
</body>
</html>