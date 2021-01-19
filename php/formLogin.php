<?php
//Induljon a session
session_start();
unset($_SESSION['errorMessage']);
require_once 'globalVariables.php';
require_once 'makeConnection.php';

//üres változók
$name = htmlentities(trim($_POST["userName"]));
$password = htmlentities(trim($_POST["password"]));

//Felhasznhasználónév
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prepare a select statement
	$q = "SELECT password, userID,isWriter,isAdmin,hasKey FROM users WHERE userName='$name'";
	$get = $conn->query($q) or $_SESSION['errorMessage'].="Hiba a jelszóellenörzés során";
	$holder = $get->fetch_assoc();
	if (empty($holder)) {
	    
	    $_SESSION['errorMessage'] .= "Nincs ilyen nevű felhasználó";
	} else {
	    if ($holder['password'] == sha1($password)) {
		// Jó a jelszó kezdjünk új sessiont
		session_start();
		

		// Adatok beállítása
		$_SESSION["loggedin"] = true;
		$_SESSION["userID"] = $holder['userID'];
		$_SESSION["username"] = $name;
		$_SESSION["writer"] = $holder['isWriter'];
		$_SESSION["admin"] = $holder['isAdmin'];
		$_SESSION["hasKey"] = $holder['hasKey'];
		unset($_SESSION['errorMessage']);//vsz fölösleges

			    } else {

		$_SESSION['errorMessage'] .= "A jelszó nem jó";
	    }
	}
    } else {
	$_SESSION['errorMessage'] .= "A bejelentkezés nem sikerült";
    }


    // lez�r�s
    $conn->close();
    // Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);


    ?>