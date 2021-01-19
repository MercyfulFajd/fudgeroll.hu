<?php
require_once 'makeConnection.php';
require_once 'makeForm.php';
require_once 'makeInput.php';
//menjen még a session
session_start();
unset($_SESSION['errorMessage']);

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    
    
    if($admin = $_SESSION["admin"]){
	$form = (new makeForm("php/formPushNews.php","post","newsForm"));
	$form->add((new makeInput("Hír Címe", "newsTitle"))->addMoreStuff("required"))
			->add((new makeInput("newsText", "newsText"))->addMoreStuff("required"));
    echo $form->pushOutHTML();
    echo "<hr>";

	$form = (new makeForm("php/formDeleteUser.php","post","delUserForm"));
	$form->add((new makeInput("Kit törlünk ma?", "userName"))->addMoreStuff("required"));
			
    echo $form->pushOutHTML();
    echo "<hr>";

	$form = (new makeForm("php/formDeleteBook.php","post","delBookForm"));
	$form->add((new makeInput("Mit törlünk ma?", "bookID"))->addMoreStuff("required"));
			
    echo $form->pushOutHTML();
    echo "<hr>";
	
	
    }
    
    if($_SESSION["hasKey"]){

	$form = (new makeForm("php/formGive.php","post","giverForm"));
	$form->add((new makeInput("Ki legyen menő?", "userName"))->addMoreStuff("required"))
		->add(new makeInput("Írhat", "canWrite", "checkbox"))
		->add(new makeInput("Adminkodhat", "canAdmin", "checkbox"))
		;
    echo $form->pushOutHTML();	
		echo "<hr>";	
    
	$form = (new makeForm("php/formTake.php","post","takerForm"));
	$form->add((new makeInput("Ki ne legyen már az", "userName"))->addMoreStuff("required"))
		->add(new makeInput("Nem Írhat", "cantWrite", "checkbox"))
		->add(new makeInput("Nem Adminkodhat", "cantAdmin", "checkbox"))
		;
			
    echo $form->pushOutHTML();
	echo "<hr>";
	
    }
    else if($_SESSION["writer"]){echo "Nem kellene itt lenned";} 
    else {echo "Adminnak ennyi jár"; }
    
    
}

else{echo "Nagyon nagyon nem kellene itt lenned";}
