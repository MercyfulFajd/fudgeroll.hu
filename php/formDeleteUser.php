<?php
session_start();
unset($_SESSION['errorMessage']);
require_once 'makeConnection.php';
$enemy = htmlentities(trim($_POST["userName"]));


$q = "DELETE FROM `users` WHERE `users`.`userName` ='$enemy'";
$_SESSION['errorMessage'] = $q;

		$get = $conn->query($q) or die("Hiba a törlés során");
		
		
		
		$conn->close();	
		
		// Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);?>