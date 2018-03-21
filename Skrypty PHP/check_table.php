<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
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