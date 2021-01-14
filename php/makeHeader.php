<?php require_once 'makeConnection.php';
    
    echo "<div><div id='title'><img alt='Fajd Logo' src=".getImageUrl($conn, 1).">FudgeRoll</div><div id='userZone'>";
	    if ($loggedin) {
		    makeButton('showSwitch("logoutForm")', 'Kilépek', 'button');
		    makeButton('showSwitch("profileForm")', 'Profil', 'button');
		} else {
		    makeButton('showSwitch("loginForm")', 'Belépek', 'button');
		    makeButton('showSwitch("registerForm")', 'Regisztrálok', 'button');
		}
		
		echo '</div></div>';
		
	   


	echo '<div id="loginForm" class="w3-modal w3-animate-zoom">
	    <div class="w3-modal-content w3-theme-dark w3-card-4">
		<h3 class="w3-panel w3-theme-l1">Bejelentkezek</h3>


		<form action="php/formLogin.php" method="post" class="w3-panel">

		    <label for="userName">Felhasználónév</label>
		    <input type="text" name="userName" id="userNameL" class="w3-input">

		    <label for="password">Jelszó</label>
		    <input type="password" id="passwordL" name="password" class="w3-input">

		    <label id="loginErrorMessage"></label>
		    <!--Elfelejtett jelszó-->


		    <div class="w3-panel w3-theme-l1">
			<input class="far fa-thumbs-up fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" type="submit" value="Küld">
			<input class="far fa-dizzy fa-lg w3-button w3-theme-d1 w3-round-xlarge w3-wide" type="reset" value="Pánik">
			<input class="far fa-thumbs-down fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" onclick="showSwitch(loginForm)" type="button" value="Mégse">

		    </div>

		</form>
	    </div>
	</div>


	<!--Register Form-->
	<div id="registerForm" class="w3-modal w3-animate-zoom">
	    <div class="w3-modal-content w3-theme-dark w3-card-4">
		<h3 class="w3-panel w3-theme-l1">Regisztálok!</h3>


		<form action="php/formRegister.php" method="post" class="w3-panel">

		    <label for="userName">Felhasználónév</label>
		    <input type="text" name="userName" id="userNameR" class="w3-input">
		    <span id="userNameError"></span><br>

		    <label for="passwordR">Jelszó</label>
		    <input type="password" id="passwordR" name="password" class="w3-input">
		    <span id="passwordError" ></span><br>


		    <label for="passwordAgain">Jelszó Megint</label>
		    <input type="password" id="passwordAgain" name="passwordAgain" class="w3-input">
		    <span id="passwordAgainError"></span><br>




		    <div class="w3-panel w3-theme-l1">
			<input class="far fa-thumbs-up fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" type="submit" value="Küld">
			<input class="far fa-dizzy fa-lg w3-button w3-theme-d1 w3-round-xlarge w3-wide" type="reset" value="Pánik">
			<input class="far fa-thumbs-down fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" onclick="showSwitch("registerForm")" type="button" value="Mégse">

		    </div>

		</form>

	    </div>

	</div>




	<!--Logout-->
	<div id="logoutForm" class="w3-modal w3-animate-zoom">
	    <form action="php/formLogout.php" method="post" class="w3-modal-content">

		<div class="w3-panel w3-theme-l1">
		    <input class="far fa-thumbs-up fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" type="submit" value="Biztos">
		    <input class="far fa-thumbs-down fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" onclick="showSwitch("logoutForm")" type="button" value="Mégse">

		</div>

	    </form>


	</div>
	<!--Profile-->
	<div id="profileForm" class="w3-modal w3-animate-zoom">
	    <form action="php/formProfile.php" method="post" class="w3-modal-content">

		<div class="w3-panel w3-theme-l1">
		    <input class="far fa-thumbs-up fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" type="submit" value="Küld">
		    <input class="far fa-dizzy fa-lg w3-button w3-theme-d1 w3-round-xlarge w3-wide" type="reset" value="Pánik">
		    <input class="far fa-thumbs-down fa-lg w3-button w3-theme-l3 w3-round-xlarge w3-wide" onclick="showSwitch("profileForm")" type="button" value="Mégse">

		</div>

	    </form>

	</div>'



	

		
		
    
?>