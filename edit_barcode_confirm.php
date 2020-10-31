<?php
	require 'db_connection.php';
	
	$item_code = $_REQUEST['item_code'];
	$item_name = $_REQUEST['item_name'];
	$item_description = $_REQUEST['item_description'];
	$item_barcode_image = $item_code . ".png";
	
	$sql = "update item set ";
	$sql .= "item_code='$item_code',";
	$sql .= "item_name='$item_name',";
	$sql .= "item_description='$item_description',";
	$sql .= "item_barcode_image='$item_barcode_image'";
	$sql .= " where item_code='$item_code'";
	
	echo $sql;
	
	$x = mysql_query($sql, $link);
	
	if ($x > 0) {
	
		header("location:generate_confirm_image.php?status=pass&item_code=$item_code");
	} else {
		header("location:generate_confirm_image.php?status=fail");
	}
?>