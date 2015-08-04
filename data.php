<?php
session_start();
include("connection.php");
	
	
	if ($_POST['submit'] == "Leave Message"  ) {
		if ($_SESSION['id']) {
	
	
		
		$query = "INSERT INTO `messages` (`text`, `date`, `userid`) VALUES('".mysqli_real_escape_string($link, $_POST['message'])."', NOW(), '".$_SESSION['id']."')";
		mysqli_query($link, $query);
		
		header("Location:mainpage.php");
	
	}
	else $error.="<br />login to leave messages";
	}
?>
