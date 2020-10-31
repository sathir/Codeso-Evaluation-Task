<?php

	session_start();
	
	if(!isset($_SESSION['user'])){
		echo "true";
		header("location:index.php");
	}

?>