<?php

	require 'db_connection.php';
	
	$item_code = $_REQUEST['item_code'];
	$item_name = $_REQUEST['item_name'];
	$item_description = $_REQUEST['textarea'];
	$item_barcode_image = $item_code . ".png";
	
	$sql = "insert into item (item_code,item_name,item_description,item_barcode_image) values( ";
	$sql .= "'$item_code',";
	$sql .= "'$item_name',";
	$sql .= "'$item_description',";
	$sql .= "'$item_barcode_image')";
	
	$x = mysql_query($sql, $link) or die(mysql_error());
	
	if ($x > 0) {
	
		header("location:generate_confirm_image.php?status=pass&item_code=$item_code");
	} else {
		header("location:generate_confirm_image.php?status=fail");
	}
?>