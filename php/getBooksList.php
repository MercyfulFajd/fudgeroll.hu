
<?php
require_once 'makeConnection.php';
$sqlGetBooks="SELECT bookID, title, coverText,coverPicture,synopsis,userName FROM books LEFT JOIN users ON users.userID = books.userID";
$get = $conn->query($sqlGetBooks) or die("Hiba a könyvek lekérése során");
		while ($line = $get->fetch_assoc()) {
		    echo
		    "<div class='w3-card-4 w3-dropdown-hover w3-theme-d3 w3-quartelthird w3-padding w3-margin' onclick=getBook($line[bookID])>"
		    ."<img src=$line[coverPicture] alt='A könyv Boritója' />"
		    ."<div class='w3-dropdown-content w3-theme-d2 w3-padding'>$line[synopsis]</div>"
		    ."<div class='w3-container'><b>$line[title]</b><br>$line[coverText]<br>A könyv szerzője: <i>$line[userName]</i></div>"
		    
		    ."</div>"
		    ;
		    
		    
			    
		    
		    
		}
$conn->close();	?>



