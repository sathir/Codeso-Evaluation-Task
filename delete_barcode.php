<?php
	require 'db_connection.php';
	
	$item_code = $_REQUEST['item_code'];
	
	$sql = "delete from item where item_code=$item_code";
	
	$x = mysql_query($sql, $link);
	
	unlink('barcodes/'.$item_code.'.png');
	
	
	if ($x > 0) {
	
		header("location:generated_record.php");
	} else {
		header("location:generated_record.php?status=fail");
	}
?>