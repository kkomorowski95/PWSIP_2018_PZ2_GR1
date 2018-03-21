<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	$game_username = $_POST["username"];
	//$game_username = "test01";
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT Status, ID FROM Game_Table WHERE Player_ID1 = '" . $game_username . "'";
	$result = mysql_query($query);
	if (mysql_numrows($result)!=0)
	{
		if (mysql_result($result,0,"Status") == 2)
		{
			$query = "UPDATE Game_Table SET Status = 3 WHERE ID =" . mysql_result($result, 0, "ID");
			$result2 = mysql_query($query);
			if (mysql_affected_rows()>0)
			{
				$query = "SELECT Deck_drawn.CardObject_ID, Game_Table.Player_hand_ID2, Deck_drawn.Slot FROM Deck_drawn, Game_Table WHERE Game_Table.Player_hand_ID2 = Deck_drawn.ID AND Game_Table.Player_ID1 = '" . $game_username . "' ORDER BY Deck_drawn.Slot ASC";
				$result = mysql_query($query);
				if (mysql_num_rows($result)!=0)
				{
					$nextcardid = mysql_result($result, 0, "Deck_drawn.CardObject_ID");
					$nextslotid = mysql_result($result, 0, "Deck_drawn.Slot");
					$playerhandid = mysql_result($result, 0, "Game_Table.Player_hand_ID2");
					$query2 = "SELECT MAX(Slot) FROM Player_hand WHERE ID = ". $playerhandid;
					$result2 = mysql_query($query2);
					$maxslot = mysql_result($result2, 0, "MAX(Slot)");
					$maxslot++;
					//echo $nextcardid . " " . $playerhandid . " " . $maxslot;
					$query3 = "DELETE FROM Deck_drawn WHERE ID = " . $playerhandid . " AND Slot = " . $nextslotid;
					//echo $query3;
					$result3 = mysql_query($query3);
					$query4 = "INSERT INTO Player_hand VALUES (" . $playerhandid . ", " . $nextcardid . ", " . $maxslot . ")";
					$result4 = mysql_query($query4);
					mysql_close();
					echo 0;
				}
				else
				{
					echo 3;
				}
			}
		}
		else
		{
			echo 1;
		}
	}
	else
	{
		$query = "SELECT Status, ID FROM Game_Table WHERE Player_ID2 = '" . $game_username . "'";
		$result = mysql_query($query);
		if (mysql_numrows($result)!=0)
		{
			if (mysql_result($result,0,"Status") == 3)
			{
				$query = "UPDATE Game_Table SET Status = 2 WHERE ID = " . mysql_result($result, 0, "ID");
				$result2 = mysql_query($query);
				if (mysql_affected_rows()>0)
				{
					$query = "SELECT Deck_drawn.CardObject_ID, Game_Table.Player_hand_ID1, Deck_drawn.Slot FROM Deck_drawn, Game_Table WHERE Game_Table.Player_hand_ID1 = Deck_drawn.ID AND Game_Table.Player_ID2 = '" . $game_username . "' ORDER BY Deck_drawn.Slot ASC";
					$result = mysql_query($query);
					if (mysql_num_rows($result)!=0)
					{
						$nextcardid = mysql_result($result, 0, "Deck_drawn.CardObject_ID");
						$nextslotid = mysql_result($result, 0, "Deck_drawn.Slot");
						$playerhandid = mysql_result($result, 0, "Game_Table.Player_hand_ID1");
						$query2 = "SELECT MAX(Slot) FROM Player_hand WHERE ID = ". $playerhandid;
						$result2 = mysql_query($query2);
						$maxslot = mysql_result($result2, 0, "MAX(Slot)");
						$maxslot++;
						//echo $nextcardid . " " . $playerhandid . " " . $maxslot;
						$query3 = "DELETE FROM Deck_drawn WHERE ID = " . $playerhandid . " AND Slot = " . $nextslotid;
						//echo $query3;
						$result3 = mysql_query($query3);
						$query4 = "INSERT INTO Player_hand VALUES (" . $playerhandid . ", " . $nextcardid . ", " . $maxslot . ")";
						$result4 = mysql_query($query4);
						mysql_close();
						echo 0;
					}
					else
					{
						echo 3;
					}
				}
			}
			else
			{
				echo 1;
			}
		}
		else
		{
			echo 2;
		}
	}
?>