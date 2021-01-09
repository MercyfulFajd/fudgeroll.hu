<?php
//indul a session
session_start();
require_once 'php/makeConnection.php';
//kapcsolja a funkciókat
require_once 'php/globalFunctions.php';
//ellenörzi, hogy be van e lépve
$loggedin = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $loggedin = true;
}
?>
<!Doctype html>
<html lang="HU-hu" dir ="ltr">
    <head>
	<title>FudgeRoll</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta name="description" content="Kalandkönyv szerkeztő és olvasó"/>
	<link rel="icon" href="<?php echo getImageUrl($conn,1);?>"/>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://kit.fontawesome.com/1b4bace53e.js"></script>
	<link href="style/colorTheme.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
	
	<!-- További Javascript file-ok a body végén -->

    </head>
    <body style="display:none">
	<?php require_once 'php/makeHeader.php';
	
	?>
	
	    <nav>
		<button class="button w3-sepia" id="openNews">Hirek</button>
		<button class="button" id="openReadMenu">Kaland Olvasása</button>
		<button class="button disabled" id="openWriter">Kaland Írása</button>
		<button class="button disabled" id="openForum">Fórum</button>
	    </nav>

	
	<main></main>
	
	    <!--JavaScript-->
	    <script src="js/index.js" type="text/javascript"></script>
	    <script src="style/index.css.js" type="text/javascript"></script>
	    
	    
    </body>
</html>
