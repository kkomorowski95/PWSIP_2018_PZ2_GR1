<?php
	include 'vars.php';
	
	$attack_id = $_POST["attacknumer"];
	//$game_username = "test02";
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	//$query = "SELECT * FROM Game_Table WHERE Player_ID1 = '" . $game_username . "'";
	//$result = mysql_query($query);
	echo $attack_id; 
?>