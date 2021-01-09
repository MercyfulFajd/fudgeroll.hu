<?php
//menjen még a session
session_start();
require_once 'globalVariables.php';
 
//kiürít
$_SESSION = array();
 
//lezár
session_destroy();
 
//Vissza a nyitóra
header("Location: $homeAddress");

?>

