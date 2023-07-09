<?php
    session_start();
    // $_POST = array_map('htmlspecialchars', $_POST);
    // echo "<pre>".print_r($_POST)."</pre>";
    $username = @$_SESSION['username'];

    if ($_SESSION['username'] == 'admin') {
        $username = "<b style='color: #31a2d6'>alex:</b>";
    } else {
        $username = "<b style='color: pink'>valentina❀:</b>";
    }
    
    $dateiname = "./chat.txt";
    if ($_POST['submit']) {

        if (empty($_POST['fileToUpload']) && empty($_POST['message'])) {
            header("Location: ./chat.php");
        }

        $date = date('(H:i) ');
        $datei = fopen($dateiname, "a");

        if (isset($_FILES["fileToUpload"]["name"])) {

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }
            
            // Check if file already exists / Upload
            if (!file_exists($target_file)) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
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
                    flock($datei, LOCK_EX);
                    if (filesize($dateiname) < 3) {
                        fputs($datei, "<span class='messageTime'>".$date."</span><img src='./uploads/".$_FILES['fileToUpload']['name']."' width='250'>".$_POST['message']."\n\n");
                    } else {
                        fputs($datei, "<br><span class='messageTime'>".$date."</span><img src='./uploads/".$_FILES['fileToUpload']['name']."' width='250'>".$_POST['message']."\n\n");
                    }
            }            
        } else {
            
            flock($datei, LOCK_EX);
            if (filesize($dateiname) < 3) {
                fputs($datei, "<span class='messageTime'>".$date."</span>".$username." ".$_POST['message']."\n\n");
            } else {
                fputs($datei, "<br><span class='messageTime'>".$date."</span>".$username." ".$_POST['message']."\n\n");
            }
            
        }
        
        flock($datei, LOCK_UN);
        fclose($datei);

        header("Location: ./chat.php");
    } else {
        header("Location: ./chat.php");
    }
?>