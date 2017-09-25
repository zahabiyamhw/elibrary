<?php
	require_once(".\user.php");
	
	$temp = new user;
	$temp->id = $_POST["id"];
	$temp->Fname = $_POST["Fname"];
	$temp->Lname = $_POST["Lname"];
	$temp->mobile = $_POST["mobile"];
	$message = $temp->insert_user($temp);
	echo $message;
	echo "<br>";
?>