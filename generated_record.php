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
	<?php
		if (isset($_REQUEST['status'])) {
		if(($_REQUEST['status'])=="fail"){
	?>
			<div class="row">
			<div class="col s6">
			<div class="card-panel red accent-2">
				<span class="white-text"> Fail to delete</span>
			</div>
			</div>
			</div>

	<?php
	}
	}
	?>
	
	<div class="row">
		<div class="col s12 m5">
			<div class="card-panel blue lighten-1">
				<h4 class="white-text"> Logged in as <?php echo $_SESSION['user']; ?></h4>
				<button class="btn waves-effect waves-light" onclick="window.location.href='./logout.php'" name="generate">
				Logout <i class="material-icons right">grain</i>
			</button>
			</div>
		</div>
		
		<div class="col s12 m5">
			<div class="card-panel grey lighten-1">
				<h4 class="white-text"> Add New Item</h4>
				<button class="btn waves-effect waves-light" onclick="window.location.href='./generate_barcode.php'" name="generate">
				Click here to add <i class="material-icons right">grain</i>
			</button>
			</div>
			
		</div>
	</div>
		
		<?php
				if(($_SESSION['user']=='admin')){
				
				$sql = "select * from item";

				$rs1 = mysql_query($sql,$link);
				
				if(mysql_num_rows($rs1)>0){

		?>
		
		<table>
        <thead>
          <tr>
              <th>Item Code</th>
              <th>Item Name</th>
              <th>Item Description</th>
              <th>Barcode</th>
              <th>Download</th>
              <th>Delete</th>
              
          </tr>
        </thead>

        <tbody>
        	<?php while( $row = mysql_fetch_assoc($rs1) ){	?>
						<tr>
							<td><a href="./edit_barcode.php?item_code=<?php echo $row['item_code']?>"><?php echo $row['item_code']?></a></td>
							<td><?php echo htmlspecialchars($row['item_name'])?></td>
							<td><?php echo htmlspecialchars($row['item_description'])?></td>
							<td><img  src="barcode.php?codetype=Code39&size=40&text=<?php echo $row['item_code']; ?>&print=true" width="200" height="100"></td>
							<td>
								<a href="barcode.php?codetype=Code39&size=40&text=<?php echo $row['item_code']; ?>&print=true" download>
									<button class="btn">PNG</button>
								</a>
								<a href="download_as_zip.php?file_name=<?php echo $row['item_code']; ?>" class="btn">ZIP</a>
							</td>
							<td>
								<!-- href="./delete_barcode.php?item_code=<?php echo $row['item_code']?>"-->
							 
									<button type="button" data-code="<?php echo $row['item_code']?>" class="btn red accent-2 btn-delete">Click to Delete X</button>
								
							</td>
						</tr>
			<?php
			}
			}
			?>
        </tbody>
      </table>
<?php	}	//Admin table end

				if(($_SESSION['user']=='user')){
				
				$sql = "select * from item";

				$rs1 = mysql_query($sql,$link);
				
				if(mysql_num_rows($rs1)>0){

		?>
		
		<table>
        <thead>
          <tr>
              <th>Item Code</th>
              <th>Item Name</th>
              <th>Item Description</th>
              <th>Barcode</th>
              <th>Download</th>
              
          </tr>
        </thead>

        <tbody>
        	<?php while( $row = mysql_fetch_assoc($rs1) ){	?>
						<tr>
							<td><?php echo $row['item_code']?></td>
							<td><?php echo htmlspecialchars($row['item_name'])?></td>
							<td><?php echo htmlspecialchars($row['item_description'])?></td>
							<td><img  src="barcode.php?codetype=Code39&size=40&text=<?php echo $row['item_code']; ?>&print=true" width="200" height="100"></td>
							<td>
								<a href="barcode.php?codetype=Code39&size=40&text=<?php echo $row['item_code']; ?>&print=true" download>
									<button class="btn">Click to Download as PNG&#x21B5;</button>
								</a>
							</td>
						</tr>
			<?php
			}
			}
			?>
        </tbody>
      </table>
<?php	}	?>
	<body>
	<!--Materialize JavaScript for optimized loading-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script>
		$(".btn-delete").click(function() {
			var code = $(this).data('code');
			var tr = $(this).closest('tr');
			$.ajax({
				url : 'delete_barcode.php?item_code=' + code,
				method : 'get',
				success : function(data) {
					console.log('suceess');
					tr.remove();
				}
			})
			console.log(code);

		})
		</script>
	</body>
</html>