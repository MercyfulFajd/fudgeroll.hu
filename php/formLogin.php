<?php
//Induljon a session
session_start();
require_once 'globalVariables.php';
require_once 'makeConnection.php';

//üres változók
$name = $_POST["userName"];
$password = $_POST["password"];
//Felhasználónév ellenörzése
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prepare a select statement
	$q = "SELECT password, userID FROM users WHERE userName='" . trim($_POST["userName"] . "'");
	$get = $conn->query($q) or $_SESSION['errorMessage']="Hiba a jelszóellenőrzás során";
	$holder = $get->fetch_assoc();
	if (empty($holder)) {
	    
	    $_SESSION['errorMessage'] = "nincs ilyen ember";
	} else {
	    if ($holder['password'] == sha1($password)) {
		// Jó a jelszó kezdjünk új sessiont
		session_start();
		

		// Adatok beállítása
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
    header("Location: $homeAddress");


    ?>