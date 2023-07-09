<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
<form action="./auswerten.php" method="post">
    <input type="text" name="message" placeholder="Sag dem alex wie gern du ihn hast" required autofocus>
    <input type="submit" name="gesendet" value="Senden">
    <div class='form-switch' style='width: 200%;'>
      <input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckChecked' onclick='Autoscroll()' checked>
      Autoscroll <span id='on-off'>OFF</span>
    </div>
</form>
</body>
</html>
<script type="text/javascript">

function Autoscroll() {
   var x = document.getElementById("on-off");
		if (x.innerHTML === "ON") {
            x.innerHTML = "OFF";
            setInterval(scrollToBottom, -1);
            window.location.reload();
          } else {
            x.innerHTML = "ON";
            setInterval(scrollToBottom, 0);
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
	setInterval (loadLog, 1000);	//Reload file every 1 second
});
</script>