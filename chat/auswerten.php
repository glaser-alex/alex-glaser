<?php
    session_start();
    // $_POST = array_map('htmlspecialchars', $_POST);
    echo "<pre>".print_r($_POST)."</pre>";
    $username = @$_SESSION['username'];

    if ($_SESSION['username'] == 'admin') {
        $username = "<b style='color: #31a2d6'>alex:</b>";
        $backgroundColor = "#31a2d630";
    } else {
        $username = "<b style='color: pink'>valentina❀:</b>";
        $backgroundColor = "#EA91A130";
    }
    
    $dateiname = "./chat.txt";
    if ($_POST['submit']) {

        // If message is empty
        if (empty($_POST['message'])) {
            header("Location: ./chat.php");
            exit();
        }

        $date = date('(H:i) ');
        $datei = fopen($dateiname, "a");
        flock($datei, LOCK_EX);

        if (!empty($_FILES["fileToUpload"]["name"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists / Upload
            if (!file_exists($target_file)) {
                echo "Test";
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                fputs($datei, "<div class='messageDIV messageMitImg' style='background: ".$backgroundColor."'>".$username."<br><img src='./uploads/".$_FILES['fileToUpload']['name']."' width='250'><br>".$_POST['message']."<br><span class='messageTime'>".$date."</span></div>\n\n");
            }            
        } else {
            fputs($datei, "<div class='messageDIV' style='background: ".$backgroundColor."'><span class='messageTime'>".$date."</span>".$username." ".$_POST['message']."</div>\n\n");
        }
        
        flock($datei, LOCK_UN);
        fclose($datei);

        header("Location: ./chat.php");
    } else {
        header("Location: ./chat.php");
    }
?>