<?php
	include 'vars.php';
	
	$game_username = $_POST["username"];
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT * FROM Pair_Matched WHERE Player_name1 = '" . $game_username . "' OR Player_name2 = '" . $game_username . "'";
	$result = mysql_query($query);
	mysql_close();
	if (mysql_numrows($result)!=0)
	{
		echo mysql_result($result,0,"ID");
		echo "|";
		if (mysql_result($result,0,"Player_name1") == $game_username)
		{
			echo mysql_result($result,0,"Player_name2");
		}
		else
		{
			echo mysql_result($result,0,"Player_name1");
		}
	}
	else
	{
		echo "0";
	}
	echo "|";
	echo $_POST["username"];
	
?>