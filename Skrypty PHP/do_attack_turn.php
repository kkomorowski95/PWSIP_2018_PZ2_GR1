<?php
	include 'vars.php';
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	
	$query = "SELECT * FROM Game_Table WHERE Player1_Handshake > 0 AND Player2_Handshake > 0 AND Status = 4";
	$result = mysql_query($query);
	
	$num=mysql_numrows($result);
	if ($num!=0)
	{
		$i = 0;
		while ($i < $num) 
		{
			$result2;
			$result3;
			//Jeśli id ataku jest różne od 4 to szukaj ataku
			if (mysql_result($result,$i,"Player2_Handshake" < 4))
			{
					$query3 = "SELECT Attack.damage, CardObject.actual_health FROM Attack, Attack_Ids, Card, CardObject, Game_Table WHERE Game_Table.Card_played2 = CardObject.id AND Game_Table.ID = CardObject.Table_ID AND CardObject.card_id = Card.id AND Card.attack_ids = Attack_Ids.id AND Attack_Ids.attack" . mysql_result($result,$i,"Player2_Handshake") . " = Attack.id";
					$result3 = mysql_query($query3);
					echo "P2 attak";
			}
			//Dla drugiego gracza
			if (mysql_result($result,$i,"Player1_Handshake" < 4))
			{
					$query2 = "SELECT Attack.damage, CardObject.actual_health FROM Attack, Attack_Ids, Card, CardObject, Game_Table WHERE Game_Table.Card_played1 = CardObject.id AND Game_Table.ID = CardObject.Table_ID AND CardObject.card_id = Card.id AND Card.attack_ids = Attack_Ids.id AND Attack_Ids.attack" . mysql_result($result,$i,"Player1_Handshake") . " = Attack.id";
					$result2 = mysql_query($query2);
					echo "P1 attak";
			}
			
			//Obliczenie obrażeń
			$card1_actualhp = mysql_result($result2,0,"actual_health") - mysql_result($result3,0,"damage");
			$card2_actualhp = mysql_result($result3,0,"actual_health") - mysql_result($result2,0,"damage");
			//echo ";" . mysql_result($result2,0,"actual_health") . " - " . mysql_result($result3,0,"damage") . " = " . $card1_actualhp . "|" . mysql_result($result3,0,"actual_health") . " - " . mysql_result($result2,0,"damage") . " = " . $card2_actualhp;
			
			//Sprawdzenie czy hp mniejsze bądź równe 0
			if ($card1_actualhp <= 0)
			{
				$query4 = "UPDATE Game_Table SET Card_played1 = 0 WHERE ID = " . mysql_result($result,$i,"ID");
				$result4 = mysql_query($query4);
				$player1_hp = mysql_result($result,$i,"Player1_HP") -  abs($card1_actualhp);
				echo mysql_result($result,$i,"Player1_HP") . " + " . $card1_actualhp . " = " . $player1_hp;
				$querry = "UPDATE Game_Table SET Player1_HP = " . $player1_hp . " WHERE ID = " . mysql_result($result,$i,"ID");
				$resullt = mysql_query($querry);
				echo ";karta 1 nie żyje";
			}
			else
			{
				$query4 = "UPDATE CardObject SET actual_health = " . $card1_actualhp . " WHERE id = " . mysql_result($result,$i,"Card_played1") . " AND Table_ID = " . mysql_result($result,$i,"ID");
				$result4 = mysql_query($query4);
				echo ";karta 1 żyje";
			}
			
			if ($card2_actualhp <= 0)
			{
				$query5 = "UPDATE Game_Table SET Card_played2 = 0 WHERE ID = " . mysql_result($result,$i,"ID");
				$result5 = mysql_query($query5);
				$player2_hp = mysql_result($result,$i,"Player2_HP") - abs($card2_actualhp);
				echo mysql_result($result,$i,"Player2_HP") . " + " . $card2_actualhp . " = " . $player2_hp;
				$querry2 = "UPDATE Game_Table SET Player2_HP = " . $player2_hp . " WHERE ID = " . mysql_result($result,$i,"ID");
				$resullt2 = mysql_query($querry2);
				echo ";karta 2 nie żyje";
			}
			else
			{
				$query5 = "UPDATE CardObject SET actual_health = " . $card2_actualhp . " WHERE id = " . mysql_result($result,$i,"Card_played2") . " AND Table_ID = " . mysql_result($result,$i,"ID");
				$result5 = mysql_query($query5);
				echo ";karta 2 żyje";
			}
			
				$query6 = "UPDATE Game_Table SET Player1_Handshake = 0, Player2_Handshake = 0 WHERE ID = " . mysql_result($result,$i,"ID");
				$result6 = mysql_query($query6);
				echo "powinno zrobić";
			
			//Sprawdzanie HP
			$queryn = "SELECT Player1_HP, Player2_HP FROM Game_Table WHERE ID = " . mysql_result($result,$i,"ID");
			$resultn = mysql_query($queryn);
			$p1lost = 0;
			$p2lost = 0;
			if (mysql_result($resultn, 0, "Player1_HP") <= 0)
			{
				$p1lost = 1;
				echo "Gracz 1 przegrał! " . mysql_result($resultn, 0, "Player1_HP");
			}
			if (mysql_result($resultn, 0, "Player2_HP") <= 0)
			{
				$p2lost = 1;
				echo "Gracz 2 przegrał! " . mysql_result($resultn, 0, "Player2_HP");
			}
			//5 - wygrana gracz 1, 6 - wygrana gracz 2, 7 - remis
			if ($p1lost == 1 && $p2lost == 1)
			{
				$queryw1 = "UPDATE Game_Table SET Status = 7 WHERE ID = " . mysql_result($result,$i,"ID");
				$resultw1 = mysql_query($queryw1);
				echo " Status 7?";
			}
			else if ($p1lost == 1)
			{
				$queryw2 = "UPDATE Game_Table SET Status = 6 WHERE ID = " . mysql_result($result,$i,"ID");
				$resultw2 = mysql_query($queryw2);
				echo " Status 6?";
			}
			else if ($p2lost == 1)
			{
				$queryw3 = "UPDATE Game_Table SET Status = 5 WHERE ID = " . mysql_result($result,$i,"ID");
				$resultw3 = mysql_query($queryw3);
				echo " Status 5?";
			}
			
			$i++;
		}
	}
	echo "DONE";
?>