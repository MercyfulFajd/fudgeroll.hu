<?php
//szükséges dolgok
require_once "makeConnection.php";
require_once "globalVariables.php";
//változók
$userName = trim($_POST["userName"]);
$password = trim($_POST["password"]);
$passwordAgain = trim($_POST["passwordAgain"]);
$_SESSION['errorMessage'] = 'Minden ok';
//Elvileg Javascrip ezeket elintézi, de sose árt kétszer ellenörizni. (javascript kijátszható)
if ($userName == ""){$_SESSION['errorMessage'] = "Felhasználónév kiürült";}
if (strlen($password)<$passwordMinLength){$_SESSION['errorMessage'] = "Jelszó túl rövid";}
if ($password != $passwordAgain){$_SESSION['errorMessage'] = "Két jelszó nem egyenlő";}
//Felhasználónév meglétének ellenörzése  -- késöbb javascriptre átírni
$q = "SELECT userID FROM users WHERE userName = '$userName'";
$get = $conn->query($q) or die("Hiba a névösszehasonlítás során" . $q);
if ($get->num_rows == 1) {
    $_SESSION['errorMessage'] = "Ez a név már foglalt";
    
}
echo $_SESSION['errorMessage'];
if ($_SESSION['errorMessage']== 'Minden ok') {
	$q = "INSERT INTO users (userName,password) VALUES ('" . $userName . "', SHA1('" . $password . "'));";
	$put = $conn->query($q) or die("Hiba az adatbázisba illesztés" . $q);
    }

// lezárás
    $conn->close();
// Vissza a lapra
    header("Location : $homeAddress");
?>
