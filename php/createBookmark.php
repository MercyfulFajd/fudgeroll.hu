<?php
require 'makeConnection.php';
//indul a session
session_start();
unset($_SESSION['errorMessage']);
//elkéri a szükséges változókat
$userID=$_SESSION['userID'];
$path = htmlentities(trim("../".$_POST['path']));

//bekéri a könyvjelző prototipust
$fromJson = file_get_contents($path);
$prototype = json_decode($fromJson,true);
$bookID=$prototype['bookID'];
//létrehoz vagy felűlírja a könyvjelzöt alapálláson
$bookmarkPath="assets/bookmarks/$bookID/$userID.json";

$back = json_encode($prototype);
file_put_contents("../$bookmarkPath", $back);

//lekéri adatbázisból van e már könyvjelző, ha nincs akkor csinál. 
$sqlGetBookmarkPath = "SELECT bookmarkPath FROM `bookmarks` WHERE `userID` = $userID AND `bookID` = $bookID";

    $answer = $conn->query($sqlGetBookmarkPath) or die("Hiba könyvjelző lekérése során");
    if (mysqli_num_rows($answer) == 0) {
	$sqlCreateBookmark = "INSERT INTO bookmarks (userID, bookID, bookmarkPath) VALUES ('$userID','$bookID','$bookmarkPath')";
	
	$get = $conn->query($sqlCreateBookmark) or die("Hiba a könyvjelző készitése során");
	
	
	
    } 
    
$conn->close();    
echo $bookmarkPath;

?>
