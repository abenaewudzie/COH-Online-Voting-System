<?php
	session_start(); 
	require 'admin/dbcon.php';
	
	if(!ISSET($_SESSION['voters_id'])){
		header("location:index.php");
	}else{
		$session_id=$_SESSION['voters_id'];
		$user_query = $conn->query("SELECT * FROM voters WHERE voters_id = '$session_id'") or die(mysql_errno());
		$user_row = $user_query->fetch_array();
		$user_username = $user_row['firstname']." ".$user_row['lastname'];
	}
?>