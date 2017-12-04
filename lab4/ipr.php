<!DOCTYPE html>
<html>
	<head>
		<title>Individual task</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<h2>Form to complite</h2>
		<form method="POST" action="ipr.php">
			<table>
				<tr>
					<td><p>Account number:</p></td>
					<td><input type="text" name="num">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST"){
							if (!is_numeric($_POST["num"])) {
								echo "<p>Value should be numeric</p>";
							}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Type your initial balance:</p></td>
					<td>
						<input type="text" name="balance">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST"){
							if (!is_numeric($_POST["balance"])) {
								echo "<p>Value should be numeric</p>";
							}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Overall amount of expence:</p></td>
					<td><input type="text" name="exp">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST"){
							if (!is_numeric($_POST["exp"])) {
								echo "<p>Value should be numeric</p>";
							}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Overal amount of credit:</p></td>
					<td><input type="text" name="cre">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST") {
							if (!is_numeric($_POST["cre"])) {
								echo "<p>Value should be numeric</p>";
							}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Max amount of credit:</p></td>
					<td><input type="text" name="max">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST") {
							if (!is_numeric($_POST["max"])) {
								echo "<p>Value should be numeric</p>";
							}
						}
						?>
					</span>
					</td>
				</tr>
				<tr>
					<td colspan="2"><h2>Simple amount of loan</h2>
					</td>
				</tr>
				<tr>
					<td><p>Insert general amount of loan:</p></td>
					<td><input type="text" name="loan">
						<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST") { 
							if (!is_numeric($_POST["loan"])) {
								echo "<p>Value should be numeric</p>";
							}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Insert percent amount:</p></td>
					<td><input type="text" name="per">
						<?php
							if ($_SERVER["REQUEST_METHOD"]=="POST") { 
								if (!is_numeric($_POST["per"])) {
									echo "<p>Value should be numeric</p>";
								}
						}?>
					</td>
				</tr>
				<tr>
					<td><p>Insert duration of use:</p></td>
					<td><input type="text" name="days">
						<?php
							if ($_SERVER["REQUEST_METHOD"]=="POST") { 
								if (!is_numeric($_POST["days"])) {
									echo "<p>Value should be numeric</p>";
								}
						}?>
					</td>
				</tr>
				<tr>
					<td>
						<p><b>Payment for the loan is:</b>
							<?php
							if ($_SERVER["REQUEST_METHOD"]=="POST") {
								$interest = $_POST["loan"] * $_POST["per"] * $_POST["days"] / 365;
								echo $interest;
							}
							?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="reset" value="Reset">
						<input type="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
		<?php 
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
				echo "<br /><h2>Account data:</h2><br />";
				echo "<p><b>Account number:</b> ".$_POST["num"]."</p>";
				echo "<p><b>Max amount of credit:</b> ".$_POST["max"]."</p>";
				$balance = $_POST["balance"] + $_POST["exp"] - $_POST["cre"];
				echo "<p><b>Your balance is:</b> {$balance}</p>";
				if ($balance > $_POST["max"]) echo "<p>Your balance is <b>greater</b> than maximum amount of credit</p>";
		}
		?>
	</body>
</html>