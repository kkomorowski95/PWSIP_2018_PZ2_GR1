<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
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
	