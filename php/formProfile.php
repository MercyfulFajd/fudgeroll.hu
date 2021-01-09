<?php 
session_start();
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
	$q="SELECT `userID`, `userName`, `canWrite`, `regDate` FROM `users` WHERE userID='".$_SESSION["userID"]."'";
	$get = $conn->query($q) or die("Hiba az adatlekérés során". $q);
	$line=$get->fetch_assoc(); 
	$o = $line["canWrite"]?"tudsz":"nem tudsz";
                    echo "<article><h2>$line[userName]</h2>";
		    echo "<i>Te vagy a $line[userID] számú emberünk<i>"
		    . "<p>Aki $line[regDate] -kor regisztrált</p>"
		    . "és ".$o. " írni"
		    . "</article>";
                
	
	
	
	
	
	
	
	
	
	?>
    </body>
</html>
