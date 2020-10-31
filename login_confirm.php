<?php

	session_start();
	require 'db_connection.php';
	$username = $_POST['username'];
	$access_code = sha1($_POST['access_code']);
	
	$sql = "select * from login where username='$username'";
	
	$rs  = mysql_query($sql,$link) or die(mysql_error());

	if(mysql_num_rows($rs)>0){
		
		$row = mysql_fetch_assoc($rs);
		
		if($row['access_code']===$access_code){
			$_SESSION['user'] = $row['username'];
			$_SESSION['user_type'] = $row['type'];
			header("location:generated_record.php");
		}
		else{
				
			header("location:index.php?status=error&message=Invalid Login Credential");
		}
	}
	else {
		session_destroy();
		header("location:index.php?status=error&message=Invalid Login Credential");
	}

?>