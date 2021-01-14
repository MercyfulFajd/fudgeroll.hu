
<?php
require_once 'makeConnection.php';
$sqlGetBooks="SELECT bookID, title, coverText,coverPicture,userName FROM books LEFT JOIN users ON users.userID = books.userID";
$get = $conn->query($sqlGetBooks) or die("Hiba a könyvek lekérése során");
		while ($line = $get->fetch_assoc()) {
		    echo
		    "<article onclick=getBookCover($line[bookID])>"
		    ."<img src='https://drive.google.com/uc?export=view&id=0Bw08dIGjEPFdSWtMTXcyZGxVaXc' alt='A könyv Boritója' />"
		    ."<div>$line[coverText]</div>"
		    ."<span><b>$line[title]</b><br><br>A könyv szerzője: <i>$line[userName]</i></span>"
		    
		    ."</article>"
		    ;
		    
		    
			    
		    
		    
		}
$conn->close();	?>



