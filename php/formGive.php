<?php
session_start();
unset($_SESSION['errorMessage']);

require_once 'makeConnection.php';
$benefactor = htmlentities(trim($_POST["userName"]));
$canAdmin = isset($_POST["canAdmin"])?true:false;
$canWrite = isset($_POST["canWrite"])?true:false;
	



//átírni bind paramétersre
if ($canAdmin && $canWrite){
$q = "UPDATE `users` SET `isWriter` = '1',`isAdmin` = '1'  WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
}
else if ($canWrite){
$q = "UPDATE `users` SET `isWriter` = '1' WHERE `users`.`userName` = '$benefactor'";

		$get = $conn->query($q) or die("Hiba a felemelkedés során");
		
}
else if ($canAdmin){
$q = "UPDATE `users` SET `isAdmin` = '1' WHERE `users`.`userName` = '$benefactor'";

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