<?php
require_once 'makeConnection.php';

$sqlGetNews = "SELECT date,newsText,newsTitle  FROM news ORDER BY date DESC";
		$get = $conn->query($sqlGetNews) or die("Hiba a hírek lekérdezése során");
		while ($line = $get->fetch_assoc()) {
		    echo
		    "<article class='w3-card w3-theme-d3'>"
		    . "<h4 class='w3-container w3-theme-d2'>$line[newsTitle]</h4>"
		    . "<div class='w3-container w3-theme-d1'><i>$line[date]</i>"
		    . "<p class='w3-container w3-theme-d2'>$line[newsText]</p></div>"
		    . "</article>";
		}
		
		
		$conn->close();	?>

