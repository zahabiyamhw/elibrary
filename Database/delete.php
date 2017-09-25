<?php
	require_once(".\book.php");
	
	$temp = new book;
	$temp->id = $_POST["id"];
	$message = $temp->delete_book($temp);
	echo $message;
	echo "<br>";
?>
