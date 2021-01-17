<?php 
require_once 'makeConnection.php';
require_once 'makeForm.php';
require_once 'makeInput.php';

    
    echo "<div><div id='title'><img alt='Fajd Logo' src=".getImageUrl($conn, 1).">FudgeRoll</div><div id='userZone'>";
	    if ($loggedin) {
		    makeButton('showSwitch("logoutForm")', 'Kilépek', 'button');
		    makeButton('showSwitch("profileForm")', 'Profil', 'button');
		    //logoutForm
		    $form = (new makeForm("php/formLogout.php","post","logoutForm"))->setClass('hiding');
		    echo $form->pushOutHTML();
			
		
		//ProfileForm
		    $form = (new makeForm("php/formProfile.php","post","profileForm"))->setClass('hiding');
			
			
		
		
		
		echo $form->pushOutHTML();
		} else {
		    makeButton('showSwitch("loginForm")', 'Belépek', 'button');
		    makeButton('showSwitch("registerForm")', 'Regisztrálok', 'button');
		//loginform
		    $form = (new makeForm("php/formLogin.php","post","loginForm"))->setClass('hiding');
			
		$form->add(new makeInput("Felhasználónév", "userName"))
			->add(new makeInput("Jelszó", "password", "password"))
			;
			
		
		
		
		echo $form->pushOutHTML();
		//registerform
		$form = (new makeForm("php/formRegister.php","post","registerForm"))->setClass('hiding');
			
		$form->add(new makeInput("Felhasználónév", "userName"))
			->add(new makeInput("Jelszó", "password", "password"))
			->add(new makeInput("Jelszó Mégegyszer", "passwordAgain", "password"))
			;
			
		
		
		
		echo $form->pushOutHTML();
		
		}
		
		
		echo '</div></div>';

    
?>