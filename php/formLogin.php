<?php
//Induljon a session
session_start();
require_once 'globalVariables.php';
require_once 'makeConnection.php';

//üres változok
$name = $_POST["userName"];
$password = $_POST["password"];
//Felhasználónév ellenörzése
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prepare a select statement
	$q = "SELECT password, userID FROM users WHERE userName='" . trim($_POST["userName"] . "'");
	$get = $conn->query($q) or $_SESSION['errorMessage']="Hiba a jelszóellen?rzés során";
	$holder = $get->fetch_assoc();
	if (empty($holder)) {
	    
	    $_SESSION['errorMessage'] = "nincs ilyen ember";
	} else {
	    if ($holder['password'] == sha1($password)) {
		// JÃ³ a jelszÃ³ kezdjÃ¼nk Ãºj sessiont
		session_start();
		

		// Adatok beÃ¡llÃ­tÃ¡sa
		$_SESSION["loggedin"] = true;
		$_SESSION["userID"] = $holder['userID'];
		$_SESSION["username"] = $name;
		unset($_SESSION['errorMessage']);

			    } else {

		$_SESSION['errorMessage'] = "A jelszó nem jó";
	    }
	}
    } else {
	$_SESSION['errorMessage'] = "A bejelentkezés nem sikerült";
    }


    // lezárás
    $conn->close();
    // Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);


    ?>