<?php
	$host="localhost";
	$user="root";
	$password="";
	$database="jd_chat";
	@session_start();

	
	mysql_connect($host,$user,$password) or die( "ERROR IN CONNECTION");
	mysql_select_db($database) or die (" ERROR IN DATABASE ");
?>
