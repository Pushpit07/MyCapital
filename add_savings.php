<?php
require "header_index.php";
require "dbh.inc.php";
?>

<link rel="stylesheet" href="css/add_savings.css">
<link rel="stylesheet" type="text/css" href="css/box_style_savings.css">
<link rel="stylesheet" type="text/css" href="css2/main.css">
<script src="https://kit.fontawesome.com/4630ffd9fd.js" crossorigin="anonymous"></script>

<main>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">

			<div class="container1">
				<div class="box">
					<div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
					<div class="content">
						<br>
						<h1>Savings</h1>
						<br>
						<p style="font-size: 40px;">
							<?php 

							$username = $_SESSION["username"];
							$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
							$row = mysqli_fetch_array($query);
							$user_id = $row["id"];

							$savings  = "SELECT savings FROM users WHERE id='$user_id';";
							$result   = mysqli_query($conn, $savings);

							//To check for any error

							/*if (!$result) { 
								printf("Error: %s\n", mysqli_error($conn));
								exit();
							}*/  

							$total_val= mysqli_fetch_array($result);
							$total_savings = $total_val["savings"];

							if($total_savings)
							{
								echo "₹ ". $total_savings;
							}
							else
							{
								echo "₹ 0";
							}

							?>
						</p>
					</div>
				</div>
			</div>

			<div class="hero">
				<div class="form-box">
					<div class="button-box">
						<div id="btn"></div>
						<button type="button" class="toggle-btn">Add to your savings</button>
					</div>
					<form id="signup" class="input-group" action="add_savings.inc.php" method="post">
						<input type="text" class="input-field" name="sum1" id="sum2" placeholder="Sum" required><br>
						<input type="date" class="input-field" name="date1" id="date2" required><br><br>
						<button type="submit" class="submit-btn" name="cash-submit"  id="cash_submit2" style="vertical-align: middle;"><span>Add to Savings</span></button>
					</form>
				</div>
			</div>


			<div class="hero2">
				<div class="form-box">
					<div class="button-box">
						<div id="btn"></div>
						<button type="button" class="toggle-btn">Update your Savings</button>
					</div>
					<form id="signup" class="input-group" action="update_savings.inc.php" method="post">
						<input type="text" class="input-field" name="sum2" id="sum3" style="margin-top: 30px;" placeholder="Sum" required><br>
						<input type="date" class="input-field" name="date2" id="date3" style="margin-top: 60px; border-radius: 10px; background: white; color: grey;" required><br><br>
						<button type="submit" class="submit-btn" name="cash-submit2"  id="cash_submit3" style="vertical-align: middle; margin-top: 70px;"><span>Update Savings</span></button>
					</form>
				</div>
			</div>


		</div>
	</div>
</main>

