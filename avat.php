<?php
	
	session_start();
	
	include("connection.php");

$target_dir = "avatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error.= "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $error.= "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error.="Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $error.= "Sorry, your file was not uploaded.";
	header("Location:mainpage.php");
	

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		
		$path_file = $target_dir.$_FILES["fileToUpload"]["name"];
		
		$sql = "UPDATE `users` SET `avatar`='".htmlspecialchars($path_file)."' WHERE users.id='".$_SESSION['id']."'";
		mysqli_query($link, $sql);
		header("Location:mainpage.php");
    } else {
        $error.= "Sorry, there was an error uploading your file.";
    }
}
?>
