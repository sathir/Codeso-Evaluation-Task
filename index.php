<?php session_start(); session_destroy(); ?>

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
<?php if (isset($_GET['message'])) { ?>

  	<div class="row">
	    <div class="col s12 m5">
			<div class="card-panel red accent-2">
				<span class="white-text"> <?php echo $_GET['message']; ?></span>
			</div>
		</div>
	</div>
	
<?php } ?>
</br>
</br>
</br>
</br>
<div class="container">
	<form class="col s12" name="login" method="post" action="login_confirm.php">
		<div class="row">
		<div class="col s6">
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<input name="username" id="icon_prefix" type="text" required="required">
				<!-- Checked for null value validation -->
				<label for="icon_prefix">Username</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
				<input name="access_code" id="icon_telephone" type="password" required="required">
				<!-- Checked for null value validation -->
				<label for="icon_telephone">Password</label>
			</div>
			</div>
			
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="login">
				Login <i class="material-icons right">lock_open</i>
			</button>
	</form>
</div>
	<body>

		<!--Materialize JavaScript for optimized loading-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
</html>