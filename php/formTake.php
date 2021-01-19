<?php
session_start();
unset($_SESSION['errorMessage']);

require_once 'makeConnection.php';
$benefactor = htmlentities(trim($_POST["userName"]));

$cantAdmin = isset($_POST["cantAdmin"])?true:false;
$cantWrite = isset($_POST["cantWrite"])?true:false;
	



//átírni bind paramétersre
if ($cantAdmin && $cantWrite){
$q = "UPDATE `users` SET `isWriter` = '0',`isAdmin` = '0'  WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
}
else if ($cantWrite){
$q = "UPDATE `users` SET `isWriter` = '0' WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
		
}
else if ($cantAdmin){
$q = "UPDATE `users` SET `isAdmin` = '0' WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
		
}
else{$_SESSION["errorMessage"]="ezért kár volt";}
/*
$q = "UPDATE `users` SET `isWriter` = '1' WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
		
		
	*/	
		$conn->close();	
		
// Vissza a lapra
header("Location:".$_SERVER['HTTP_REFERER']);