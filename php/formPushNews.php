<?php
session_start();
unset($_SESSION['errorMessage']);
require_once 'makeConnection.php';
$title = $_POST["newsTitle"];

$text = $_POST["newsText"];
$q = "INSERT INTO news (userID,newsTitle,newsText) VALUES ('".$_SESSION["userID"]."','" . $title . "', '" . $text . "');";

		$get = $conn->query($q) or die("Hiba a hírek beíllesztése során");
		
		
		
		$conn->close();	
		header("Location:".$_SERVER['HTTP_REFERER']);?>
