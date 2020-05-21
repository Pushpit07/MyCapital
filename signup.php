<?php
require "header_header.php";
?>
<link rel="stylesheet" href="css/signup_style.css">

<link rel="stylesheet" type="text/css" href="css2/main.css">
<main>
	
	<?php

	if(isset($_GET['error'])){
		if($_GET['error']== "emptyfields"){
			echo '<p> Fill in all fields!</p>';
		}
		else if($_GET['error']=="passwordcheck"){
			echo '<p>Passwords do not match</p>';
		}
	}
	else if(isset($_GET['signup'])){
		if($_GET['signup']=="success"){
			echo '<p>Signup Successful!</p>';
		}
	}
	?>
	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
		
				<div class="hero">
					<div class="form-box">
						<div class="button-box">
							<div id="btn"></div>
							<button type="button" class="toggle-btn">Fill this form to become a user!</button>
						</div>
						<form id="signup" class="input-group" action="signup.inc.php" method="post">
							<input type="text" class="input-field" name="username" placeholder="Username" required>
							<input type="text" class="input-field" name="email" placeholder="Email" required>
							<input type="password" class="input-field" name="pwd" placeholder="Password" required>
							<input type="password" class="input-field" name="pwd-repeat" placeholder="Confirm Password" required>
							<button type="submit" class="submit-btn" name="signup-submit" style="vertical-align: middle;"><span>Sign Up </span></button>
						</form>
					</div>
				</div>

		</div>
	</div>

</main>