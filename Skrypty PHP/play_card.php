<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";

	$game_username = $_POST["username"];
	$card_played = $_POST["card_slot"];
	//$game_username = "test02";
	//$card_played = "3";
	
	$drawncardcount = 5;
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT Player_Hand_ID1, Status, ID FROM Game_Table WHERE Player_ID1 = '" . $game_username . "'";
	$result = mysql_query($query);
	if (mysql_numrows($result)!=0)
	{
		$query = "SELECT Card.ID, Card.type, Card.element_id, Card.health, Player_hand.Slot, Player_hand.ID FROM Card, Player_hand WHERE Card.ID = Player_hand.CardObject_ID AND Player_hand.Slot = " . $card_played . " AND Player_hand.ID = " . mysql_result($result, 0, "Player_Hand_ID1");
		$result2 = mysql_query($query);
		if (mysql_numrows($result2)!=0 && mysql_result($result,0,"Status") == 2)
		{
			if (mysql_result($result2,0,"Card.type") == 1)
			{
				$query = "SELECT MAX(ID) FROM Element_Count";
				$result3 = mysql_query($query);
				$maxidp1 = mysql_result($result3,0,"MAX(ID)") + 1;
				$query = "INSERT INTO Element_Count VALUES (" . $maxidp1 . ", 0, 0, 0, 0)";
				$result4 = mysql_query($query);
				$query = "SELECT MAX(ID) FROM CardObject";
				$result5 = mysql_query($query);
				$maxidp2 = mysql_result($result5,0,"MAX(ID)") + 1;
				$query = "INSERT INTO CardObject VALUES (" . mysql_result($result,0,"ID") . ", " . $maxidp2 . ", " . mysql_result($result2,0,"Card.ID") . ", " . mysql_result($result2,0,"Card.health") . ", " . mysql_result($result2,0,"Card.health") . ", 0, " . $maxidp1 . ")";
				$result6 = mysql_query($query);
				$query = "DELETE FROM Player_hand WHERE ID = " . mysql_result($result2,0,"Player_hand.ID") . " AND Slot = " . mysql_result($result2,0,"Player_hand.Slot");
				$result7 = mysql_query($query);
				$query = "UPDATE Game_Table SET Card_played1=" . $maxidp2 . " WHERE ID=" . mysql_result($result,0,"ID");
				$result8 = mysql_query($query);
				echo $query . "\n";
				echo mysql_errno() . ": " . mysql_error() . "\n";
				echo 0;
			}
			else if (mysql_result($result2,0,"Card.type") == 2)
			{
				$query = "SELECT Card_played1 FROM Game_Table WHERE ID = " . mysql_result($result,0,"ID");
				$result3 = mysql_query($query);
				if (mysql_numrows($result3) != 0)
				{
					if (mysql_result($result3, 0, "Card_played1") != 0)
					{
						switch (mysql_result($result2,0,"Card.element_id"))
						{
							case 1:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El1 = El1 + " . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played1");
								$result5 = mysql_query($query);
								break;
							case 2:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El2 = El2 +" . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played1");
								$result5 = mysql_query($query);
								break;
							case 3:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El3 = El3 +" . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played1");
								$result5 = mysql_query($query);
								break;
							case 4:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El4 = El4 + " . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played1");
								$result5 = mysql_query($query);
								break;
							default:
								echo 6;
								die();
								break;
						}
						$query = "DELETE FROM Player_hand WHERE ID = " . mysql_result($result2,0,"Player_hand.ID") . " AND Slot = " . mysql_result($result2,0,"Player_hand.Slot");
						$result6 = mysql_query($query);
						echo 0;
					}
					else
					{
						echo 5;
					}
				}
				else
				{
					echo 4;
				}
			}
			else 
			{
				echo 3;
			}
		}
		else
		{
			echo 2;
		}
	}
	else
	{
		$query = "SELECT Player_Hand_ID2, Status, ID FROM Game_Table WHERE Player_ID2 = '" . $game_username . "'";
		$result = mysql_query($query);
		if (mysql_numrows($result)!=0)
		{
			$query = "SELECT Card.ID, Card.health, Card.type, Card.element_id, Player_hand.Slot, Player_hand.ID FROM Card, Player_hand WHERE Card.ID = Player_hand.CardObject_ID AND Player_hand.Slot = " . $card_played . " AND Player_hand.ID = " . mysql_result($result, 0, "Player_Hand_ID2");
			$result2 = mysql_query($query);
			if (mysql_numrows($result2)!=0 && mysql_result($result,0,"Status") == 3)
			{
				if (mysql_result($result2,0,"Card.type") == 1)
				{
				$query = "SELECT MAX(ID) FROM Element_Count";
				$result3 = mysql_query($query);
				$maxidp1 = mysql_result($result3,0,"MAX(ID)") + 1;
				$query = "INSERT INTO Element_Count VALUES (" . $maxidp1 . ", 0, 0, 0, 0)";
				$result4 = mysql_query($query);
				$query = "SELECT MAX(ID) FROM CardObject";
				$result5 = mysql_query($query);
				$maxidp2 = mysql_result($result5,0,"MAX(ID)") + 1;
				$query = "INSERT INTO CardObject VALUES (" . mysql_result($result,0,"ID") . ", " . $maxidp2 . ", " . mysql_result($result2,0,"Card.ID") . ", " . mysql_result($result2,0,"Card.health") . ", " . mysql_result($result2,0,"Card.health") . ", 0, " . $maxidp1 . ")";
				$result6 = mysql_query($query);
				$query = "DELETE FROM Player_hand WHERE ID = " . mysql_result($result2,0,"Player_hand.ID") . " AND Slot = " . mysql_result($result2,0,"Player_hand.Slot");
				$result7 = mysql_query($query);
				$query = "UPDATE Game_Table SET Card_played2 = " . $maxidp2 . " WHERE ID = " . mysql_result($result,0,"ID");
				$result8 = mysql_query($query);
				echo 0;
				}
				else if (mysql_result($result2,0,"Card.type") == 2)
				{
					$query = "SELECT Card_played2 FROM Game_Table WHERE ID = " . mysql_result($result,0,"ID");
					$result3 = mysql_query($query);
					if (mysql_numrows($result3) != 0)
					{
						if (mysql_result($result3, 0, "Card_played2") != 0)
						{
						switch (mysql_result($result2,0,"Card.element_id"))
						{
							case 1:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El1 = El1 + " . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played2");
								$result5 = mysql_query($query);
								break;
							case 2:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El2 = El2 +" . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played2");
								$result5 = mysql_query($query);
								break;
							case 3:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El3 = El3 +" . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played2");
								$result5 = mysql_query($query);
								break;
							case 4:
								$sum = mysql_result($result2,0,"Card.health");
								$query = "UPDATE Element_Count SET El4 = El4 + " . $sum . " WHERE ID = " . mysql_result($result3,0,"Card_played2");
								$result5 = mysql_query($query);
								break;
							default:
								echo 6;
								die();
								break;
						}
							
							$query = "DELETE FROM Player_hand WHERE ID = " . mysql_result($result2,0,"Player_hand.ID") . " AND Slot = " . mysql_result($result2,0,"Player_hand.Slot");
							$result6 = mysql_query($query);
							echo 0;
						}
						else
						{
							echo 5;
						}
					}
					else
					{
						echo 4;
					}
				}
				else
				{
					echo 3;
				}
			}
			else
			{
				echo 1;
			}
		}
	}
?>