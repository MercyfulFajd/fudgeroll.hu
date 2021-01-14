<?php
require_once 'makeConnection.php';

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
		
		
		$conn->close();	?>

