<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	$game_username = $_POST["username"];
	
	$drawncardcount = 5;
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT * FROM Pair_Matched WHERE CreatingStarted = 0";
	$result = mysql_query($query);
	$query2 = "UPDATE Pair_Matched SET CreatingStarted = 1";
	$result2 = mysql_query($query2);
	$num=mysql_numrows($result);
	if ($num!=0)
	{
		$i=0;
		while ($i < $num) 
		{
			$queryp1 = "SELECT Deck_card.Deck_ID, Deck_card.Card_ID FROM Deck_card, Player WHERE Deck_card.Deck_ID = Player.active_deck AND Player.name = '" . mysql_result($result,$i,"Player_name1") . "'";
			$resultp1 = mysql_query($queryp1);
			$nump1 = mysql_numrows($resultp1);
			$p1cards = array();
			$j=0;
			if ($nump1!=0)
			{
				while ($j < $nump1)
				{
					$temp = mysql_result($resultp1, $j, "Deck_card.Card_ID");
					$p1cards[] = $temp;
					$j++;
				}
			}
			shuffle($p1cards);
			
			$checkmaxquery = "SELECT MAX(ID) FROM Deck_drawn";
			$checkmaxresult = mysql_query($checkmaxquery);
			
			$j = 0;
			$queryadd = "INSERT INTO Deck_drawn VALUES ";
			$queryadd1 = "INSERT INTO Player_hand VALUES ";
			$maxidp1 = 0;
			$maxidp1 = mysql_result($checkmaxresult,0,"MAX(ID)") + 1;
			while ($j < $drawncardcount)
			{
					if($j!=0)
					{
						$queryadd1 = $queryadd1 . ", ";
					}
					$queryadd1 = $queryadd1 . "(" . $maxidp1 . ", " . $p1cards[$j] . ", " . $j . ")";
					$j++;
			}
			$resultadd1 = mysql_query($queryadd1);
			while ($j < $nump1)
			{
				if ($j > $drawncardcount)
				{
						$queryadd = $queryadd . ", ";
				}
				$queryadd = $queryadd . "(" . $maxidp1 . ", " . $p1cards[$j] . ", " . $j . ")";
				$j++;
			}
			$resultadd = mysql_query($queryadd);
			
			$queryp2 = "SELECT Deck_card.Deck_ID, Deck_card.Card_ID FROM Deck_card, Player WHERE Deck_card.Deck_ID = Player.active_deck AND Player.name = '" . mysql_result($result,$i,"Player_name2") . "'";
			$resultp2 = mysql_query($queryp2);
			$nump2 = mysql_numrows($resultp2);
			$p2cards = array();
			$j=0;
			if ($nump2!=0)
			{
				while ($j < $nump2)
				{
					$temp = mysql_result($resultp2, $j, "Deck_card.Card_ID");
					$p2cards[] = $temp;
					$j++;
				}
			}
			shuffle($p2cards);
			
			$checkmaxquery = "SELECT MAX(ID) FROM Deck_drawn";
			$checkmaxresult = mysql_query($checkmaxquery);
			
			$j = 0;
			$queryadd = "INSERT INTO Deck_drawn VALUES ";
			$queryadd1 = "INSERT INTO Player_hand VALUES ";
			$maxidp2 = 
			$maxidp2 = mysql_result($checkmaxresult,0,"MAX(ID)") + 1;
			while ($j < $drawncardcount)
			{
					if($j!=0)
					{
						$queryadd1 = $queryadd1 . ", ";
					}
					$queryadd1 = $queryadd1 . "(" . $maxidp2 . ", " . $p2cards[$j] . ", " . $j . ")";
					$j++;
			}
			$resultadd1 = mysql_query($queryadd1);
			while ($j < $nump2)
			{
				if ($j > $drawncardcount)
				{
						$queryadd = $queryadd . ", ";
				}
				$queryadd = $queryadd . "(" . $maxidp2 . ", " . $p2cards[$j] . ", " . $j . ")";
				$j++;
			}
			$resultadd = mysql_query($queryadd);
			
			$tableidquery = "SELECT MAX(ID) FROM Game_Table";
			$resulttableid = mysql_query($tableidquery);
			$tableid = mysql_result($resulttableid,0,"MAX(ID)");
			$tableid++;
			$tablequery = "INSERT INTO Game_Table VALUES (" . $tableid . ", '" . mysql_result($result,$i,"Player_name1") . "', '" . mysql_result($result,$i,"Player_name2") . "', " . $maxidp1 . ", " . $maxidp2 . ", " . $maxidp1 . ", " . $maxidp2 . ", 0, 0, 0, 0, 2)";
			$tableresult = mysql_query($tablequery);
			echo mysql_errno($tableresult) . ": " . mysql_error($tableresult). "\n";
			$i++;
			
		}
	}
	else
	{
		echo "0";
	}
	mysql_close();
	
?>