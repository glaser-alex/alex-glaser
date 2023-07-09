<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <title>Chat</title>
</head>
<body>
<div id="chatBoxDIV">
  <div id="content">
  <?php
        $dateiname = "./chat.txt";
        $daten = file_get_contents($dateiname);
        echo $daten;
    ?>
  </div>
</div>
<div class="form">
  <form action="./auswerten.php" method="post" enctype="multipart/form-data">
    <label for="upload">Upload</label>
    <input type="file" name="fileToUpload" id="upload">
    <input type="text" name="message" placeholder="Sag dem alex wie gern du ihn hast" autofocus>
    <input type="submit" name="submit" value="Senden">
  </form>
  <br>
  <button onclick="Autoscroll()" id="scrollButton">Autoscroll <span id='on-off'>OFF</span></button>
</div>
</body>
</html>
<script type="text/javascript">

// setInterval(scrollToBottom, 0);

function Autoscroll(submit) {
  var x = document.getElementById("on-off");
    if (x.innerHTML === "OFF") {
      x.innerHTML = "ON";
      setInterval(scrollToBottom, 0);
    } else if (x.innerHTML === 'ON') {
      x.innerHTML = "OFF";
      setInterval(scrollToBottom, -1);
      window.location.reload();
    }
}

function scrollToBottom() {
  const element = document.getElementById("content");
  element.scrollIntoView(false);
}

// jQuery Document
$(document).ready(function(){

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
	setInterval (loadLog, 1000);	//Reload file every second
});
</script>