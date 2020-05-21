<?php 
if(isset($_POST['signup-submit'])){

	require 'dbh.inc.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	function email_validation($str) { 
		return (!preg_match( 
			"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
		? FALSE : TRUE; 
	} 

	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		header("Location: signup.php?error=emptyfields&email=".$email);
		exit();
	}
	
	else if($password !== $passwordRepeat){
		header("Location: signup.php?error=passwordcheck&email=".$email);
		exit();
	}

	else if(!email_validation($email)){
		echo '<script type="text/javascript">';
		echo ' alert("Invalid Email")';  
		echo '</script>';
		header("refresh: 0.5; url = signup.php");
		exit();
	}

	else{

		$sql ="SELECT email FROM users WHERE email=?";
		$stmt =mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: signup.php?error=sqlerror");
			exit();
		}

		else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck >0)
			{
				header("Location: signup.php?error=emailtaken");
				exit();
			}

			else{

				$sql = "INSERT INTO users (username, email, pwd) VALUES (?,?,?)";
				$stmt =mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: signup.php?error=sqlerror");
					exit();
				}

				else{

					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: after_signup.php?signup=success");
					exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else{
	header("Location: index.php");
	exit();
}


?>