<?php
//Induljon a session
session_start();
unset($_SESSION['errorMessage']);
//szükséges dolgok
require_once "makeConnection.php";
require_once "globalVariables.php";
//változók
$userName = htmlentities(trim($_POST["userName"]));
$password = htmlentities(trim($_POST["password"]));
$passwordAgain = htmlentities(trim($_POST["passwordAgain"]));
$accepted = htmlentities(trim($_POST["accept"]));//vsz túlzás
$_SESSION['errorMessage']= '';

if(!$accepted){$_SESSION['errorMessage'] = "Ha nem fogadsz el mindent, akkor nem tudsz regisztrálni<br>";}

//Elvileg Javascrip ezeket elint�zi, de sose �rt k�tszer ellen�rizni
if ($userName == ""){$_SESSION['errorMessage'] .= "Felhasználónév kiürült<br>";}
if (strlen($password)<$passwordMinLength){$_SESSION['errorMessage'] .= "Jelszó túl rövid<br>";}
if ($password != $passwordAgain){$_SESSION['errorMessage'] .= "Két jelszó nem egyenlő<br>";}
//Felhasználónév meglétének ellenörzése  -- késöbb javascriptre átírni
$q = "SELECT userID FROM users WHERE userName = '$userName'";
$get = $conn->query($q) or die("Hiba a névösszehasonlítás során" . $q);
if ($get->num_rows == 1) {
    $_SESSION['errorMessage'] .= "Ez a név már foglalt<br>";
    
}

if ($_SESSION['errorMessage']== '') {
	$q = "INSERT INTO users (userName,password) VALUES ('" . $userName . "', SHA1('" . $password . "'));";
	$put = $conn->query($q) or die("Hiba az adatbázisba illesztés" . $q);
	unset($_SESSION['errorMessage']);
    }

    



// lezárás

    $conn->close();
// Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);
?>
