<?php 
require_once 'makeConnection.php';
require_once 'makeForm.php';
require_once 'makeInput.php';
require_once 'makeButton.php';

$visitor = $loggedin ? $_SESSION["username"]: "Látogató";    
    echo "<div><span class='logoSide'>Üdvözlet Kedves $visitor</span><span id='logo'><img alt='Fajd Logo' src=".getImageUrl($conn, 1).">FudgeRoll</span><span id='userButtons' class='logoSide'>";
		    $btn = (new makeButton("Menü","btnMenuOpen", "showSwitch(&quot;navBar&quot;)","btn btnMenu"));
		    echo $btn->pushOutHTML()."</span>"; echo '</div>';?>

		
<nav id="navBar">
		<?php
		$btn = (new makeButton("Hírek","btnNews", "news()"));
		    echo $btn->pushOutHTML();
		$btn = (new makeButton("Kaland Olvasása","btnRead", "libary()"));
		    echo $btn->pushOutHTML();
		if($writer){
		    $btn = (new makeButton("Kaland Írása","btnWrite", "desk()"));
		    echo $btn->pushOutHTML();
		    
		    
		}
		if($admin){$btn = (new makeButton("Adminisztráció","btnAdmin", "janitor()"));
		    echo $btn->pushOutHTML();
		    }
		
	
    if ($loggedin) {
		    $btn = (new makeButton("Profil","btnProfil", "profile()"));
		    echo $btn->pushOutHTML();
		    $btn = (new makeButton("Kilépés","btnLogout", "showSwitch(&quot;logoutForm&quot;)"));
		    echo $btn->pushOutHTML();
		    //logoutForm
		    $form = (new makeForm("php/formLogout.php","post","logoutForm"))->setClass('hiding');
		    echo $form->pushOutHTML();
			
		
		
		    
		} else {
		    $btn = (new makeButton("Regisztrálás","btnRegister", "showSwitch(&quot;registerForm&quot;)"));
		    echo $btn->pushOutHTML();
		    $btn = (new makeButton("Belépés","btnLogin", "showSwitch(&quot;loginForm&quot;)"));
		    echo $btn->pushOutHTML();
		//loginform
		    $form = (new makeForm("php/formLogin.php","post","loginForm"))->setClass('hiding');
			
		$form->add((new makeInput("Felhasználónév", "userName"))->addMoreStuff("required"))
			->add((new makeInput("Jelszó", "password", "password"))->addMoreStuff("required"))
			;
			
		
		
		
		echo $form->pushOutHTML();
		//registerform
		$form = (new makeForm("php/formRegister.php","post","registerForm"))->setClass('hiding');
			
		$form->add((new makeInput("Felhasználónév", "userName"))->addMoreStuff("required"))
			->add((new makeInput("Jelszó", "password", "password"))->addMoreStuff("required"))
			->add((new makeInput("Jelszó Mégegyszer", "passwordAgain", "password"))->addMoreStuff("required"))
			->add(new makeInput("Elfogadok mindent", "accept", "checkbox"))
			;
			
		}
		
		echo '</div>';
		echo $form->pushOutHTML();
		$btn = (new makeButton("&uarr;&uarr;&uarr;","btnMenuClose", "showSwitch(&quot;navBar&quot;)","btn btnMenu"));
		    echo $btn->pushOutHTML()."</span>";?>
		
		
		

  