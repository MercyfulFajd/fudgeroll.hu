<?php
session_start();
unset($_SESSION['errorMessage']);
echo
		    "<article id='newsItem'>"
		    . "<h4>Az oldal ezen eleme fejlesztés alatt van</h4>"
		    . "<div>Köszönjük az érdeklődést, kellemes olvasgatást :)</div>"
		    . "</article>";
?>