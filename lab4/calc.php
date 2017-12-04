<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
</head>
<body>
	<form method="POST" action="calc.php">
		<table style="width: 50%;">
			<tr>
				<td style="width: 25%"><p>The Result of calculation will be shown here:</p></td>
				<td style="width: 25%">
					<p style="width: 15%;
								border: 1px solid black;
								border-radius: 5px;
								margin: 10px;
								padding: 5px;">
					<?php 
					$res = "0";
					if ($_SERVER["REQUEST_METHOD"]=="POST"){
						if (empty($_POST["operation"])) {
							echo $res;
						} 
						elseif (empty($_POST["valueA"]) && empty($_POST["valueB"])) {
							echo $res;
						} else {
						$a = $_POST["valueA"];
						$b = $_POST["valueB"];
						switch ($_POST["operation"]) {
							case 'summ':
								echo $res = $a + $b;
								break;
							case 'diff':
								echo $res = $a - $b;
								break;
							case 'pow':
								echo $res = $a * $b;
								break;
							case 'del':
								echo $res = $a / $b;
								break;
							default:
								echo $res;
								break;
						}
					}
					} else {
						echo $res;
					}
					?>
					</p>
				</td>
			</tr>
			<tr>
				<td><label>First digit</label></td>
				<td><input type="text" name="valueA">
					<span style="display: inline-block; color: red; clear: both;"><?php
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
						if (!is_numeric($_POST["valueA"])) {
							echo "This should be numeric";
						}
					}
					?></span>
				</td>
			</tr>
			<tr>
				<td><label>Second digit</label></td>
				<td><input type="text" name="valueB">
					<span style="display: inline-block; color: red; clear: both;"><?php
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
						if (!is_numeric($_POST["valueA"])) {
							echo "This should be numeric";
						}
					}
					?></span>
				</td>
			</tr>
			<tr><td><p>Available operations:</p></td>
				<td><input type="radio" name="operation" value="summ" checked>+
					<input type="radio" name="operation" value="diff">-
					<input type="radio" name="operation" value="pow">*
					<input type="radio" name="operation" value="del">/
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" value="Calculate" style="background-color:green; border-radius: 5px; font-size: 20px;">
				</td>
			</tr>
			<tr>
				<td><p>Server array:</p></td>
				<td><p>POST array:</p></td>
			</tr>
			<tr>
				<td style="width: 25%"><?php
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
						foreach ($_SERVER as $k => $v) {
							echo "<p>{$k} = {$v};\n</p>";
						};
					}
					?>
				</td>
				<td style="width: 25%"><?php
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
						foreach ($_POST as $k => $v) {
							echo "<p>{$k} = {$v};\n</p>";
						};
					}
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>