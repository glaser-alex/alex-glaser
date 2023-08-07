<nav class="top-nav">
    <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/home">
      <img src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/img/logo.png" alt="logo" height="50">
    </a>
    <input id="menu-toggle" type="checkbox">
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
    </label>
    <ul class="menu">
      <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/home">Home</a>
      <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/games">Games</a>
      <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/referenzen">Referenzen</a>
      <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/kontakt">Kontakt</a>
      <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/chat">Chat</a>
      <a href="./?cookie=reset">Cookie ändern</a>
      <?php

        if ($_COOKIE['username'] == 'admin' || $_SESSION['username'] == 'admin') {
          echo "<a style='color: cyan;' href='https://".$_SERVER['SERVER_NAME']."/administration?action=einträge'>Login Einträge</a>";
          echo "<a href='https://".$_SERVER['SERVER_NAME']."/administration?action=nachrichten'>Nachrichten</a>";
          echo "<a style='color: red;' href='https://".$_SERVER['SERVER_NAME']."/administration?action=erstellen'>Login Tabelle zurücksetzen</a>";
          echo "<a style='color: lime;' href='https://".$_SERVER['SERVER_NAME']."/administration?action=anzeigen'>Login Tabelle anzeigen</a>";
        }

        if (!$_SESSION['login']) {
          echo "<a href='https://".$_SERVER['SERVER_NAME']."/login'>Login</a>";
        } else {
          echo "<a href='https://".$_SERVER['SERVER_NAME']."/login/logout.php'>Logout</a>";
        }
      ?>
      <a style="cursor: auto;"></a>
    </ul>
  </nav>