<?php
//Induljon a session
session_start();
require_once 'globalVariables.php';
require_once 'makeConnection.php';

//�res v�ltozok
$name = $_POST["userName"];
$password = $_POST["password"];
//Felhaszn�l�n�v ellen�rz�se
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prepare a select statement
	$q = "SELECT password, userID FROM users WHERE userName='" . trim($_POST["userName"] . "'");
	$get = $conn->query($q) or $_SESSION['errorMessage']="Hiba a jelsz�ellen?rz�s sor�n";
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

		$_SESSION['errorMessage'] = "A jelsz� nem j�";
	    }
	}
    } else {
	$_SESSION['errorMessage'] = "A bejelentkez�s nem siker�lt";
    }


    // lez�r�s
    $conn->close();
    // Vissza a lapra
    header("Location:".$_SERVER['HTTP_REFERER']);


    ?>