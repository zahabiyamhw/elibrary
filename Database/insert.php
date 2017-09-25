<?php
	require_once(".\book.php");
	
	$temp = new book;
	$temp->id = $_POST["id"];
	$temp->name = $_POST["name"];
	$temp->isbn = $_POST["isbn"];
	$temp->author = $_POST["author"];
	$temp->qty = $_POST["qty"];
	$temp->price = $_POST["price"];
	$message = $temp->insert_book($temp);
	echo $message;
	echo "<br>";
?>