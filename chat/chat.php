<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <title>vChat</title>
</head>
<body>
<div class="release">
  <h2 style="margin-block: 0.5em">Release Notes</h2>
  <em>v.1.0.7: Image Upload</em>
  <br><br>
  <em>v.1.1.7: Message with background colour.</em>
  <br><br>
  <em>v.1.3.7: Logged in as.</em>
</div>
  <?php
    session_start();
    error_reporting(E_ALL && ~E_WARNING);
    
    if ($_SESSION['username'] == 'admin') {
      $username = "<b style='color: #31a2d6'>alex</b>";
    } else {
      $username = "<b style='color: pink'>valentina❀</b>";
    }
  ?>
<div class="angemeldetAls">Angemeldet als: <?php echo $username ?></div>
<div id="chatBoxDIV" class="chatBoxDIV">
  <div id="content">
    <?php
      $dateiname = "./chat.txt";
      if (file_exists($dateiname)) { echo file_get_contents($dateiname); }
    ?>
  </div>
</div>
<div class="form">
  <form action="./auswerten.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Upload</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="message" id="message" placeholder="Schreibe eine Nachricht..." autofocus>
    <input type="submit" name="submit" value="Senden">
  </form>
</div>
<script type="text/javascript">

function scrollToBottom() {
  const element = document.getElementById("content");
  element.scrollIntoView(false);
}
setInterval(scrollToBottom, 0);


// jQuery Document
$(document).ready(function(){
  
  if (screen.width <= '900') {
    const message = document.getElementById('message');
    const chatBox = document.getElementById('chatBoxDIV');
    message.addEventListener('focusin', (event) => {
      chatBox.style.height = "50%";
      chatBox.style.height = "40vh";
    })
    
    message.addEventListener('focusout', (event) => {
      chatBox.style.height = "90%";
    })
  }

  //Load the file containing the chat log
  function loadLog(){
    var oldscrollHeight = $("#content").attr("scrollHeight") - 20;
    $.ajax({
      url: "chat.txt",
      cache: false,
      success: function(html){		
        $("#content").html(html); //Insert chat log into the #chatBox div
        },
    });
  }
  setInterval (loadLog, 500);	//Reload file every 1 second
});
</script>
</body>
<?php
  $tag = date('j'); $monat = date('n'); $jahr = date('Y');
  if (strlen($tag) == 2) { $Tag = substr($tag, 0, 1); $Tag .= ".".substr($tag, 1, 2); } else { $Tag = $tag; }
  if (strlen($monat) == 2) { $Monat = substr($monat, 0, 1); $Monat .= ".".substr($monat, 1, 2); } else { $Monat = $monat; }
  echo "<div class='version'>© $jahr Alexander Glaser v.$Tag.$Monat</div>";
?>
</html>