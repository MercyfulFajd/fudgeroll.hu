<?php

//indul a session
session_start();
require_once 'makeConnection.php';
$bookID = $_POST['id'];$loggedin = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $loggedin = true;
    $userID = $_SESSION['userID'];
    /*müködö bár fura verzió lehet törölni, csak biztos ami biztos van itt még
 * $sqlGetBookmark = "SELECT books.bookID, title, coverText,coverPicture,synopsis, bookmarkPath 
    FROM bookmarks 
    LEFT JOIN books ON bookmarks.bookID = books.bookID 
    Where books.bookID=$bookID AND bookmarks.userID=$userID;";
*/


$sqlGetBook = "SELECT bookID, title, coverText,coverPicture,synopsis,firstPagePath
    FROM books 
    Where books.bookID=$bookID";
$get = $conn->query($sqlGetBook) or die("Hiba a könyv részleteinek lekérése során");

if ($line = $get->fetch_assoc()) {
    $target =  '"'.$line['firstPagePath'].'"' ;
    
    
    
    echo "<div>"
	."<h1>$line[title]</h1>"
	."<img alt='A könyv borítója' src='$line[coverPicture]'>"
	."<h3>$line[coverText]</h3>"
	."<p>$line[synopsis]</p>"
	."</div>"
	."<div class='barBtn'><button onclick='openBook($target)'>Új kaland indítása</button>";
    /*késöbb ide kerülhet egy figyelmeztetés, ha már van mentés,
 *  hogy új kaland esetén törlödni fog.*/
    
    
    
    
}
else{echo "Valami örületes hiba csúszott a rendszerbe, és nincs meg a KÖNYV";}
$sqlGetBookmark ="SELECT bookmarkPath FROM bookmarks WHERE bookID = $bookID AND userID = $userID";
$get = $conn->query($sqlGetBookmark) or die("Hiba a könyvjelző lekérése során");
if ($line = $get->fetch_assoc()) {
    
    $target =  '"'.$line['bookmarkPath'].'"';
    echo "<button onclick='openBookAt($target)'>Előző Kaland folytatása</button><div>";
    
    
}
else{echo "</div>";}

}
else{
    echo "<div class='error'>Az olvasáshoz be kell jelentkezni.</div>";
}



$conn ->close();



?>