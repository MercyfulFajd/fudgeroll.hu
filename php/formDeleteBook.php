<?php
session_start();
unset($_SESSION['errorMessage']);
require_once 'makeConnection.php';
$enemy = htmlentities(trim($_POST["bookID"]));

$q = "DELETE FROM `books` WHERE `books`.`bookID` ='$enemy'";
		$get = $conn->query($q) or die("Hiba a törlés közepete");
		
		
		
		$conn->close();	
		// Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);
		?>