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
	<?php if (($_GET['status'])=="pass") {
	?>
	<div class="row">
		<div class="col s6">
			<div class="card-panel teal">
				<span class="white-text"> Barcode Generated Successfully</span>
			</div>

			<?php } if (($_GET['status'])=="fail") { ?>

			<div class="row">
				<div class="col s6">
					<div class="card-panel red accent-2">
						<span class="white-text"> Fail to Generate Barcode</span>
					</div>

			<?php }	?>
					<div class="row">
						<div class="col s6">

							<div class="card">
								<div class="card-image">

								</div>
								<div class="card-content">
									<img src="barcode.php?codetype=Code39&size=40&text=<?php echo $_REQUEST['item_code']; ?>&print=true" width="200" height="100"></a>
									<a href="barcode.php?codetype=Code39&size=40&text=<?php echo $_REQUEST['item_code']; ?>&print=true" download>
									<p>
										Click here to download the barcode as PNG
									</p>
								</div>
								<div class="card-action">
									<a href="generated_record.php">View all registered items</a>
								</div>
							</div>
						</div>
					</div>

					<body>
						<!--Materialize JavaScript for optimized loading-->
						<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
					</body>
</html>