<?php
require_once 'makeConnection.php';
require_once 'makeButton.php';
session_start();
unset($_SESSION['errorMessage']);

$sqlGetNews = "SELECT date,newsText,newsTitle  FROM news ORDER BY date DESC";
		$get = $conn->query($sqlGetNews) or die("Hiba a hírek lekérdezése során");
		while ($line = $get->fetch_assoc()) {
		    echo
		    "<article id='newsItem'>"
		    . "<h4>$line[newsTitle]</h4>"
		    . "<div><i>$line[date]</i>"
		    . "<p>$line[newsText]</p></div>"
		    . "</article>";
		}
		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		    $btn = (new makeButton("Kapcsolatfelvétel","btn", "alert('Kérem írjon emailt a stormvogel.fajd@gmail.com címre')"));
    
		echo"<footer>";
		    echo $btn->pushOutHTML();
		    echo "</footer>";
		}		
		
		$conn->close();	?>

