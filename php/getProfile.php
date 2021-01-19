<?php 
session_start();
unset($_SESSION['errorMessage']);
?>

<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<?php
	

	
	include_once 'makeConnection.php';
	$q="SELECT `userID`, `userName`,`regDate`,`isWriter`,isAdmin, hasKey FROM `users` WHERE userID='".$_SESSION["userID"]."'";
	$get = $conn->query($q) or die("Hiba az adatlekérés során". $q);
	$line=$get->fetch_assoc(); 
	$i = $line["isWriter"]?"tudsz":"nem tudsz";
	$m = $line["isAdmin"]?"tudsz":"nem tudsz";
	$k = $line["hasKey"]?"tudsz":"nem tudsz";
	
                    echo "<article><h2>$line[userName]</h2>"
		    . "<i>Te vagy a LEGJOBB<i>"
		    . "<p>Aki $line[regDate] -kor regisztrált</p>"
		    . "és  $i írni<br>"  
		    . "és  $m moderálni<br>"  
		    . "és  $k kegyet osztani</article><br>";
                
	
	
	
	
	
	
	
	
	
	?>
    </body>
</html>
