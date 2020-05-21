<?php

if(isset($_POST['login-submit'])) {

	require 'dbh.inc.php';

	$email = $_POST['email'];
	$password = $_POST['pwd'];

	if(empty($email) || empty($password)){
		header("Location: index.php");
		exit();
	}

	else{

		$sql = "SELECT * FROM users WHERE email=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: add_cash.php");
			exit();
		}

		else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($result)){

				$pwdCheck = password_verify($password, $row['pwd']);
				if($pwdCheck == false){
					header("Location: index.php");
					exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userID']= $row['id'];
					$_SESSION['username']=$row['username'];
					$_SESSION['emailID']= $row['email'];

					header("Location: add_savings.php");
					exit();
				}
				else{
					header("Location: index.php");
					exit();
				}
			}
			else{
				header("Location: index.php");
				exit();
			}


		}
	}

}

else{
	header("Location: index.php");
	exit();
}
?>
