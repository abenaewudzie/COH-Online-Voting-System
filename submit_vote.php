<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pres_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vp_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[gsecretary_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[fsecretary_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pro_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[woccom_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[osecretary_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		header("location:index.php");
		
?> 