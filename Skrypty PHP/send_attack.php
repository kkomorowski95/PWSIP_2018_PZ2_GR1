<?php
	include 'vars.php';
	
	$game_username = $_POST["username"];
	$attack_id = $_POST["attacknumer"];
	//$game_username = "test02";
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT * FROM Game_Table WHERE Player_ID1 = '" . $game_username . "' OR Player_ID2 = '" . $game_username . "'";
	$result = mysql_query($query);
	if (mysql_result($result,0,"Player_ID1") == $game_username && mysql_result($result,0,"Status") == 2)
	{
		$query2 = "UPDATE Game_Table SET Player1_Handshake = " . $attack_id . " WHERE Player_ID1 = '" . $game_username . "'";
		$result2 = mysql_query($query2);
		echo "Player1";
	}
	else if (mysql_result($result,0,"Player_ID2") == $game_username && mysql_result($result,0,"Status") == 3)
	{
		$query2 = "UPDATE Game_Table SET Player2_Handshake = " . $attack_id . " WHERE Player_ID2 = '" . $game_username . "'";
		$result2 = mysql_query($query2);
		echo "Player2";
	}
	echo " " . $attack_id; 
?>