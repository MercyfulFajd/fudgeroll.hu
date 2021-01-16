<?php
//menjen még a session
session_start();
require_once 'globalVariables.php';
 
//kiürít
$_SESSION = array();
 
//lezár
session_unset();
 
//Vissza a nyitóra
header("Location:".$_SERVER['HTTP_REFERER']);

?>

