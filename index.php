<!DOCTYPE html>
<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->
  <html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="google-site-verification" content="TCytXtGfc0oEUgOL_yCMYvbDUXh088iig-kk3CKQArc"/>
    <meta name="description" content="Website nur für private Nutzung">
    <meta name="keywords" content="Webentwickler, Frontend, Backend, Fullstack, Privat, Taufkirchen">
    <meta name="author" content="Alex Glaser">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/burger.css" type="text/css">
    <link rel="stylesheet" href="./css/beta-button.css" type="text/css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Webentwickler Frontend und Backend | Taufkirchen</title>
  </head>
  <body>

  <?php
    session_start();
    // error_reporting(E_ALL && ~E_WARNING);
    include("./inc/nav.php");
    
    if (!isset($_COOKIE['consent']) || @$_GET['cookie'] == 'reset') {
      include "./inc/cookiebanner.php";
    }
    if ($_GET['consent'] == 'all') {
        setcookie('consent', 'all', time() + (86400 * 30), "/"); header("Location: ../");
    } else if ($_GET['consent'] == 'notall') {
        foreach ( $_COOKIE as $key => $value ) {
            setcookie( $key, $value, time() - 3600, '/');
        }
        setcookie('consent', 'notall', time() + (86400 * 30), "/"); header("Location: ../");
    }
    // Wenn username im cookie vorhanden, dann login
    if (isset($_COOKIE['username'])) { $_SESSION['login'] = true; }
?>

<main>
  <div class="bg-img-home">
    <div class="overlay img-middle">
      <!-- <img src="./img/code-block-icon-A.png" alt="logo"> -->
    </div>
  </div>

  <div class="AuYer">
    <svg class="narrow" viewBox="0 0 100 100" preserveAspectRatio="none">
      <polygon fill="var(--body-bg)" points="0 100, 0 90, 70 0, 105 100"></polygon>
    </svg>
  </div>
  
  <div id="aboutMe" class="card">
    <h1>
      Ich bin Full-Stack Webentwickler und arbeite mit HTML, CSS, PHP, SQL und JavaScript.
    </h1>
  </div>

  <div class="button-container">
    <a href="http://beta.alex-glaser.de" target="_blank">
      <button class="beta-testen">
        <span class="circle" aria-hidden="true">
          <span class="icon arrow"></span>
        </span>
        <span class="button-text">JETZT BETA TESTEN</span>
      </button>
    </a>
  </div>

  <div class="container-h2">
    <h2 class="card-h2 gradient">Kenntnisse</h2>
  </div>

  <div class="bg-img1">
    <div class="grid-container-3" style="background-color: #00000030; backdrop-filter: blur(3px);">
      <div id="php">
        <a title="Zu W3Schools PHP" href="https://www.w3schools.com/php/default.asp" target="_blank">
          <img src="./img/php.png" alt="php"><br>
        </a>
        <h3>PHP</h3>
        <p>
          PHP (Hypertext Preprocessor) ist eine weit verbreitete 
          und für den allgemeinen Gebrauch bestimmte Open Source-Skriptsprache, 
          welche speziell für die Webprogrammierung geeignet ist 
          und in HTML eingebettet werden kann.
        </p>
      </div>
      <div id="html">
        <a title="Zu W3Schools HTML" href="https://www.w3schools.com/html/default.asp" target="_blank">
          <img src="./img/html.png" alt="html"><br>
        </a>
        <h3>HTML</h2>
        <p>
          Der Begriff "HTML" steht für "Hypertext Markup Language". 
          Hierbei handelt es sich um das Format, in dem Webseiten geschrieben werden.
        </p>
      </div>
      <div id="mysql">
        <a title="Zu W3Schools MySQL" href="https://www.w3schools.com/sql/default.asp" target="_blank">
          <img src="./img/mysql-ohne-mysql.png" alt="mysql"><br>
        </a>
        <h3>MySql</h3>
        <p>
          MySQL ist ein relationales Open-Source-SQL-Databaseverwaltungssystem, 
          das von Oracle entwickelt und unterstützt wird.
        </p>
      </div>
    </div>
  </div>
  
  <div class="container-h2">
    <h2 class="card-h2 gradient">Styling</h2>
  </div>
  
  <div class="bg-img2">
    <div class="grid-container-3" style="background-color: #00000050; backdrop-filter: blur(3px);">
      <div id="css">
        <a title="Zu W3Schools CSS" href="https://www.w3schools.com/css/default.asp" target="_blank">
          <img src="./img/css.png" alt="css"><br>
        </a>
        <h3>CSS</h3>
        <p>
          Cascading Style Sheets (CSS) ist eine Programmiersprache, 
          die es Ihnen ermöglicht, das Design von elektronischen Dokumenten zu bestimmen.
        </p>
      </div>
      <div id="bootstrap">
        <a title="Zu Bootstrap" href="https://getbootstrap.com" target="_blank">
          <img src="./img/bootstrap.png" alt="bootstrap"><br>
        </a>
        <h3>Bootstrap</h3>
        <p>
          Bootstrap ist ein kostenloses Framework zur Gestaltung von Webseiten. 
          Es operiert in den Auszeichnungssprachen HTML und CSS und bietet Vorlagen zur 
          Typografie, Icons, Tabellen, Navigation und vielem mehr.
        </p>
      </div>
      <div id="javascript">
        <a title="Zu W3Schools JavaScript" href="https://www.w3schools.com/js/default.asp" target="_blank">
          <img src="./img/js.png" alt="JavaScript"><br>
        </a>
        <h3>JavaScript</h3>
        <p>
          JavaScript ist eine Programmiersprache, die Entwickler verwenden, um interaktive Webseiten zu erstellen.
        </p>
      </div>
    </div>

    <div class="kontakt-text" style="background-color: #00000050;">
      <h1>Webentwickler</h2>
      <h3>Frontend & Backend</h3>
      <a class="kontakt-button" href="kontakt.php">Kontaktiere mich</a>
    </div>

  </div>
</main>

    <footer>

      <div class="grid-container-footer">
        <div class="item-logo v-center"><img class="img-footer" src="./img/logo.png" alt="logo"></div>
        <div class="item-header1"><b>Social Media</b></div>
        <div class="item-header2"><b>Aufbau</b></div>
        <div class="item-header3"><b>Style</b></div>
        <div class="item-header4"><b>Rechtlich</b></div>
        <div class="social1"><a title="glaser.o4" class="link fa fa-instagram" target="_blank" href="https://www.instagram.com/glaser.o4"><span class="link"> Instagram</span></a></div>
        <div class="aubau1"><a title="Zu W3Schools PHP" href="https://www.w3schools.com/php/default.asp" target="_blank">PHP</a></div>
        <div class="style1"><a title="Zu W3Schools CSS" href="https://www.w3schools.com/css/default.asp" target="_blank">CSS</a></div>
        <div class="recht1"><a title="Zu AGB" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/agb">AGB</a></div>
        <div class="social2"><a title="glaser-alex" class="link fa fa-github" target="_blank" href="https://github.com/glaser-alex"><span class="link"> Github</span></a></div>
        <div class="aubau2"><a title="Zu W3Schools HTML" href="https://www.w3schools.com/html/default.asp" target="_blank">HTML</a></div>
        <div class="style2"><a title="Zu Bootstrap" href="https://getbootstrap.com" target="_blank">Bootstrap</a></div>
        <div class="recht2"><a title="Zum Impressum" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/impressum">Impressum</a></div>
        <div class="social3"><a title="bit-gendorf.de" class="link fa fa-bitcoin" target="_blank" href="https://bit-gendorf.de/de-DE/IT-Schule"><span class="link"> BiT</span></a></div>
        <div class="aubau3"><a title="Zu W3Schools MySQL" href="https://www.w3schools.com/sql/default.asp" target="_blank">MySQL</a></div>
        <div class="style3"><a title="Zu W3Schools JavaScript" href="https://www.w3schools.com/js/default.asp" target="_blank">JavaScript</a></div>
        <div class="recht3"><a title="Zu Kontakt" href="./kontakt">Kontakt</a></div>
        <div class="item-games" lang="sub"><b>Games</b><br><a title="wimeldo.alex-glaser.de" target="_blank" href="https://wimmeldo.alex-glaser.de">Wimmeldo</a></div>
      </div>

      <?php
        $tag = date('j');
        $monat = date('n');
        $jahr = date('Y');
        if (strlen($tag) == 2) { $Tag = substr($tag, 0, 1); $Tag .= ".".substr($tag, 1, 2); } else { $Tag = $tag; }
        if (strlen($monat) == 2) { $Monat = substr($monat, 0, 1); $Monat .= ".".substr($monat, 1, 2); } else { $Monat = $monat; }
        echo "<div class='version-footer'>© $jahr Alexander Glaser v.$Tag.$Monat</div>";
      ?>

    </footer>
  
  </body>
  </html>