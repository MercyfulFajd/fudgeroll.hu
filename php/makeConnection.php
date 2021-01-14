<?php
//kapcsolat konstansok
define("HOST", "localhost");
define("USER", 'root');
define("PW", "");
define("DB", "fudgeroll");
//kapcsolat nyitása
$conn=new mysqli(HOST, USER, PW, DB) or die("Nincs Kapcsolat");

//kapcsolat beállítása magyar karakterek kezelésére
$conn->query("SET NAMES UTF8");
$conn->query("set character set UTF8");
$conn->query("set collation_connection='utf8_hungary_ci'");

?>

