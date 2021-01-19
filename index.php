<?php
//indul a session
session_start();
require_once 'php/makeConnection.php';
//kapcsolja a funkciókat
require_once 'php/globalFunctions.php';
//ellenörzi, hogy be van e lépve, jogosultságkezelés
$loggedin = false;
$writer=false;
$admin=false;
    
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $loggedin = true;
    $writer = $_SESSION["writer"]; 
    $admin = $_SESSION["admin"]; 
    
    
    
}
?>
<!Doctype html>
<html lang="HU-hu" dir ="ltr">
    <head>
	<title>FudgeRoll</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta name="description" content="Kalandkönyv szerkezt? és olvasó"/>
	<link rel="icon" href="<?php echo getImageUrl($conn,1);?>"/>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	    <script src="https://kit.fontawesome.com/1b4bace53e.js"></script>
	
	<link id="colorSheme" href="style/colorShemes/default.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
	
	
	<!-- További Javascript file-ok a body végén -->

    </head>
    <body style="display:none">
	<header>
	<?php require_once 'php/makeHeader.php';?>
	
	    
	</header><hr>
	<div id='errorZone'>
	<?php
	if (isset($_SESSION["errorMessage"]) === true) {
	    $errorMessages=$_SESSION['errorMessage'];
	    
	    
	    echo "<h4>Hiba!!!</h4>";
	    echo "<p>$errorMessages</p>"; 
	    
	    
		    
	}
	?></div><hr>
	    
	    
	
	<main></main>
	
	    <!--JavaScript-->
	    <script src="style/index.css.js" type="text/javascript"></script>
	    <script src="js/index.js" type="text/javascript"></script>
	    
	    
	    
	    
    </body>
</html>
