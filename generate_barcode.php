<?php
require 'validate_user.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<!--Used Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Used Materialize CSS Framework-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<!--Responsive intro to browser -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>

	<form name="generate" method="post" action="generate_confirm.php">
		<div class="row">

			<div class="input-field col s3">
				<i class="material-icons prefix">format_list_numbered</i>
				<input name="item_code" id="item_code" type="text" pattern="\d*" required="required">
				<!-- Checked for numbers only validation -->
				<label for="item_code">Item code</label>
			</div>
			<div class="input-field col s3">
				<i class="material-icons prefix">text_format</i>
				<input name="item_name" id="item_name" type="text" required="required">
				<!-- Checked for null value validation -->
				<label for="item_name">Item Name</label>
			</div>
			<div class="input-field col s3">
				<i class="material-icons prefix">message</i>
				<textarea name="textarea" id="textarea" class="materialize-textarea"></textarea>
				<!-- Checked for null value validation -->
				<label for="textarea">Item description</label>
			</div>

			<button class="btn waves-effect waves-light" type="submit" name="generate">
				Generate <i class="material-icons right">grain</i>
			</button>

		</div>
	</form>

	<body>
		<!--Materialize JavaScript for optimized loading-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
</html>