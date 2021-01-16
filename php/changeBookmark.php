<?php
session_start();
$userID=$_SESSION["userID"];
$bookID=$_POST['bookID'];
$path="../assets/bookmarks/$bookID/$userID.json";

$old = file_get_contents($path);
$data = json_decode($old, true);


$request=$_POST['updateTo'];
foreach ($request as $toDo){
     $data[$toDo['name']] = $toDo['to'];
     
    
}
$newContent = json_encode($data);

file_put_contents($path, $newContent);
echo $path;
    
    





?>