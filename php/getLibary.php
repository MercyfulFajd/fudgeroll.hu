
<?php
session_start();
unset($_SESSION['errorMessage']);
require_once 'makeConnection.php';
$sqlGetBooks="SELECT bookID, title, coverText,coverPicture,userName FROM books LEFT JOIN users ON users.userID = books.userID";
$get = $conn->query($sqlGetBooks) or die("Hiba a könyvek lekérése során");
		while ($line = $get->fetch_assoc()) {
		    echo
		    "<article onclick=getBookCover($line[bookID])>"
		    ."<img src='$line[coverPicture]' alt='A könyv Boritója' />"
		    ."<div>$line[coverText]</div>"
		    ."<span><b>$line[title]</b><br><br>A könyv szerzője: <i>$line[userName]</i></span>"
		    
		    ."</article>"
		    ;
		    
		    
			    
		    https://photos.google.com/share/AF1QipN_A48i7gLE8-iLnwykAMjadYF5LTYRwxV-iHeydQyl6i-Fd-koiD01xccOowyNPg/photo/AF1QipNq4CiQSmW2oBMpFyEjLfz1bR3LImSknTGTS8VL?key=YlpfMk8zR3lOakNtRkpKTmpzclMxcnUzVzJrNjJn
		    
		}
$conn->close();	?>



