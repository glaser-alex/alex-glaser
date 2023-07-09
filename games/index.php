<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/burger.css" type="text/css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Games</title>
    <style>
      @font-face {
          font-family: Monocraft;
          src: url(../font/Monocraft/Monocraft.ttf);
        }
      a {
        text-decoration: none;
       }
      .card {
        padding: 50px;
        /* display: flexbox; */
      }
      .wimmeldo {
        width: fit-content;
        display: block;
        text-align: center;
        font-family: Monocraft, Arial, sans-serif;
      }
      .beta {
        color: #000;
        border: 1px solid #000;
        -webkit-text-fill-color: #000;
      }
    </style>
  </head>
  <html>
  <body>
    <?php
      include("../inc/nav.php");
    ?>
    <div class="card">
      <a class="wimmeldo" href="https://wimmeldo.alex-glaser.de" title="wimmeldo.alex-glaser.de" target="_blank">
        <img src="../img/logo-wimmeldo.png" alt="Wimmeldo Logo" width="50">
        <p>
          Wimmeldo - Desktop<span class="beta">BETA</span>
        </p>
      </a>
    </div>
  </body>
  </html>