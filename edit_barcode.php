<?php
require 'validate_user.php';
require 'db_connection.php';
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

	<form name="generate" method="post" action="edit_barcode_confirm.php">
		<div class="row">
			<?php
			$code = $_REQUEST['item_code'];
			
			$sql = "select * from item where item_code='$code'";
			
			$rs1 = mysql_query($sql,$link);
			
			if(mysql_num_rows($rs1)>0){
			
			while( $row = mysql_fetch_assoc($rs1) ){
			?>

			<div class="input-field col s3">
				<i class="material-icons prefix">format_list_numbered</i>
				<input name="item_code" id="item_code" type="text" pattern="\d*" required="required" value="<?php echo $row['item_code']?>">
				<!-- Checked for numbers only validation -->
				<label for="item_code">Item code</label>
			</div>
			<div class="input-field col s3">
				<i class="material-icons prefix">text_format</i>
				<input name="item_name" id="item_name" type="text" required="required" value="<?php echo $row['item_name']?>">
				<!-- Checked for null value validation -->
				<label for="item_name">Item Name</label>
			</div>
			<div class="input-field col s3">
				<i class="material-icons prefix">message</i>
				<input name="item_description" id="item_description" type="text" required="required" value="<?php echo $row['item_description']?>">
				<!-- Checked for null value validation -->
				<label for="item_description">Item description</label>
			</div>

			<button class="btn waves-effect waves-light" type="submit" name="generate">
				Modify <i class="material-icons right">grain</i>
			</button>
			<?php
			}
			}
			?>
		</div>
	</form>

	<body>
		<!--Materialize JavaScript for optimized loading-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
</html>