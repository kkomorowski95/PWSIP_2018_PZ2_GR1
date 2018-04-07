<?php
	include 'vars.php';
	
	$game_username = $_POST['username'];
	$game_password = $_POST['password'];
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query="SELECT COUNT(*) FROM MM_Quick";
	$result=mysql_query($query);
	echo mysql_result($result,0,"COUNT(*)"); 
	mysql_close();
?>
	