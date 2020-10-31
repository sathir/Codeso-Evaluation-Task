<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	// Create connection
	$link = mysql_connect($servername, $username, $password);
	$db = mysql_select_db("codeso") or die('Cannot find Database');
	mysql_query($db, $link);
	
	// Check connection
	if (!$link) {
		die("Connection failed: " . msysql_connect_error());
	}
	//echo "Connected successfully";
?>