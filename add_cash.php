<?php
require "header_index.php";
?>

<link rel="stylesheet" href="css/add_cash.css">
<link rel="stylesheet" type="text/css" href="css2/main.css">

<main>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="hero">
				<div class="form-box">
					<div class="button-box">
						<div id="btn"></div>
						<button type="button" class="toggle-btn">Add cash to your account</button>
					</div>
					<form id="signup" class="input-group" action="add_cash.inc.php" method="post">
						<input type="text" class="input-field" name="source" id ="source2" placeholder="Source" required>
						<input type="text" class="input-field" name="sum1" id="sum2" placeholder="Sum" required><br>
						<input type="date" class="input-field" name="date1" id="date2" required><br><br>
						<button type="submit" class="submit-btn" name="cash-submit"  id="cash_submit2" style="vertical-align: middle;"><span>Add Cash</span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

