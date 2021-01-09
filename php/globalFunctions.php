<?php

function makeButton($action, $label, $class) {
    echo "<button class='$class' onclick='$action'>$label</button>";
}

function getImageUrl($conn, $imageID) {
    $sqlGetImageUrl = "SELECT path FROM `images` WHERE `imageID` = $imageID";
    $get = $conn->query($sqlGetImageUrl) or die("Hiba a kép címének lekérése során");
    if ($line = $get->fetch_assoc()) {
	return "$line[path]";
    } else {
	return "img/general/hiba.svg";
    }
}

?>
    


