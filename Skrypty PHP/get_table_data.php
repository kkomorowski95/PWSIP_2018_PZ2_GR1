<?php
	include 'vars.php';
	
	$game_username = $_POST["username"];
	//$game_username = "test02";
	
	mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query = "SELECT * FROM Game_Table WHERE Player_ID1 = '" . $game_username . "'";
	$result = mysql_query($query);
	if (mysql_numrows($result)!=0)
	{
		$query2 = "SELECT Player_hand.ID, Player_hand.CardObject_ID, Player_hand.Slot FROM Player_hand WHERE Player_hand.ID = " . mysql_result($result,0,"Player_hand_ID1") . " ORDER BY Slot ASC";
		$result2 = mysql_query($query2);
		$query3 = "SELECT CardObject.card_id, CardObject.actual_health, CardObject.actual_max_hp, CardObject.attack_boost, Element_Count.El1, Element_Count.El2, Element_Count.El3, Element_Count.El4 FROM CardObject, Game_Table, Element_Count WHERE Element_Count.ID = CardObject.energy_count AND Game_Table.ID = " . mysql_result($result,0,"Game_Table.ID") . " AND CardObject.ID = " . mysql_result($result,0,"Card_Played1");
		$result3 = mysql_query($query3);
		$query4 = "SELECT CardObject.card_id, CardObject.actual_health, CardObject.actual_max_hp, CardObject.attack_boost, Element_Count.El1, Element_Count.El2, Element_Count.El3, Element_Count.El4 FROM CardObject, Game_Table, Element_Count WHERE Element_Count.ID = CardObject.energy_count AND Game_Table.ID = " . mysql_result($result,0,"Game_Table.ID") . " AND CardObject.ID = " . mysql_result($result,0,"Card_Played2");
		$result4 = mysql_query($query4);
		$query5 = "SELECT COUNT(*) FROM Player_hand WHERE Player_hand.ID = " . mysql_result($result,0,"Player_hand_ID2");
		$result5 = mysql_query($query5);
		$query6 = "SELECT Attack.name, Attack.damage, Attack.element_id, Element_Sum.El0, Element_Sum.El1, Element_Sum.El2, Element_Sum.El3, Element_Sum.El4 FROM CardObject, Card, Attack_Ids, Attack, Element_Sum WHERE Element_Sum.ID = Attack.Element_req AND (Attack.ID = Attack_Ids.attack1 OR Attack.ID = Attack_Ids.attack2 OR Attack.ID = Attack_Ids.attack3 OR Attack.ID = Attack_Ids.attack4) AND Attack_Ids.id = Card.attack_ids AND Card.id = CardObject.card_id AND Attack.ID <> 0 AND CardObject.id = " . mysql_result($result,0,"Card_Played1");
		$result6 = mysql_query($query6);
		
		echo mysql_result($result,0,"Player_ID1") . "@";
		echo mysql_result($result,0,"Player_ID2") . "@";
		echo mysql_result($result,0,"Status") . "&";
		$i = 0;
		while ($i < mysql_numrows($result2))
		{
			echo mysql_result($result2,$i,"Player_hand.CardObject_ID") . "@";
			echo mysql_result($result2,$i,"Player_hand.Slot") . "$";
			$i++;
		}
		echo "&";
		
		echo mysql_result($result3,0,"CardObject.card_id") . "@";
		echo mysql_result($result3,0,"CardObject.actual_health") . "@";
		echo mysql_result($result3,0,"CardObject.actual_max_hp") . "@";
		echo mysql_result($result3,0,"CardObject.attack_boost") . "@";
		echo mysql_result($result3,0,"Element_Count.El1") . "@";
		echo mysql_result($result3,0,"Element_Count.El2") . "@";
		echo mysql_result($result3,0,"Element_Count.El3") . "@";
		echo mysql_result($result3,0,"Element_Count.El4") . "&";
		
		echo mysql_result($result4,0,"CardObject.card_id") . "@";
		echo mysql_result($result4,0,"CardObject.actual_health") . "@";
		echo mysql_result($result4,0,"CardObject.actual_max_hp") . "@";
		echo mysql_result($result4,0,"CardObject.attack_boost") . "@";
		echo mysql_result($result4,0,"Element_Count.El1") . "@";
		echo mysql_result($result4,0,"Element_Count.El2") . "@";
		echo mysql_result($result4,0,"Element_Count.El3") . "@";
		echo mysql_result($result4,0,"Element_Count.El4") . "&";
		echo mysql_result($result5,0,"COUNT(*)") . "&";
		
		echo mysql_result($result,0,"Player1_HP") . "&";
		echo mysql_result($result,0,"Player2_HP") . "&";
		
		$i = 0;
		while ($i < mysql_numrows($result6))
		{
			echo mysql_result($result6,$i,"Attack.name") . "@";
			echo mysql_result($result6,$i,"Attack.damage") . "@";
			echo mysql_result($result6,$i,"Attack.element_id") . "@";
			echo mysql_result($result6,$i,"Element_Sum.El0") . "@";
			echo mysql_result($result6,$i,"Element_Sum.El1") . "@";
			echo mysql_result($result6,$i,"Element_Sum.El2") . "@";
			echo mysql_result($result6,$i,"Element_Sum.El3") . "@";
			echo mysql_result($result6,$i,"Element_Sum.El4") . "$";
			$i++;
		}
		echo "&";
	}
	else
	{
		$query11 = "SELECT * FROM Game_Table WHERE Player_ID2 = '" . $game_username . "'";
		$result = mysql_query($query11);
		if (mysql_numrows($result)!=0)
		{
			$query2 = "SELECT Player_hand.ID, Player_hand.CardObject_ID, Player_hand.Slot FROM Player_hand WHERE Player_hand.ID = " . mysql_result($result,0,"Player_hand_ID2") . " ORDER BY Slot ASC";
			$result2 = mysql_query($query2);
			$query3 = "SELECT CardObject.card_id, CardObject.actual_health, CardObject.actual_max_hp, CardObject.attack_boost, Element_Count.El1, Element_Count.El2, Element_Count.El3, Element_Count.El4 FROM CardObject, Game_Table, Element_Count WHERE Element_Count.ID = CardObject.energy_count AND Game_Table.ID = " . mysql_result($result,0,"Game_Table.ID") . " AND CardObject.ID = " . mysql_result($result,0,"Card_Played2");
			$result3 = mysql_query($query3);
			$query4 = "SELECT CardObject.card_id, CardObject.actual_health, CardObject.actual_max_hp, CardObject.attack_boost, Element_Count.El1, Element_Count.El2, Element_Count.El3, Element_Count.El4 FROM CardObject, Game_Table, Element_Count WHERE Element_Count.ID = CardObject.energy_count AND Game_Table.ID = " . mysql_result($result,0,"Game_Table.ID") . " AND CardObject.ID = " . mysql_result($result,0,"Card_Played1");
			$result4 = mysql_query($query4);
			$query5 = "SELECT COUNT(*) FROM Player_hand WHERE Player_hand.ID = " . mysql_result($result,0,"Player_hand_ID1");
			$result5 = mysql_query($query5);
			$query6 = "SELECT Attack.name, Attack.damage, Attack.element_id, Element_Sum.El0, Element_Sum.El1, Element_Sum.El2, Element_Sum.El3, Element_Sum.El4 FROM CardObject, Card, Attack_Ids, Attack, Element_Sum WHERE Element_Sum.ID = Attack.Element_req AND (Attack.ID = Attack_Ids.attack1 OR Attack.ID = Attack_Ids.attack2 OR Attack.ID = Attack_Ids.attack3 OR Attack.ID = Attack_Ids.attack4) AND Attack_Ids.id = Card.attack_ids AND Card.id = CardObject.card_id AND Attack.ID <> 0 AND CardObject.id = " . mysql_result($result,0,"Card_Played2");
			$result6 = mysql_query($query6);
		
			echo mysql_result($result,0,"Player_ID1") . "@";
			echo mysql_result($result,0,"Player_ID2") . "@";
			echo mysql_result($result,0,"Status") . "&";
			$i = 0;
			while ($i < mysql_numrows($result2))
			{
				echo mysql_result($result2,$i,"Player_hand.CardObject_ID") . "@";
				echo mysql_result($result2,$i,"Player_hand.Slot") . "$";
				$i++;
			}
			echo "&";
		
			echo mysql_result($result3,0,"CardObject.card_id") . "@";
			echo mysql_result($result3,0,"CardObject.actual_health") . "@";
			echo mysql_result($result3,0,"CardObject.actual_max_hp") . "@";
			echo mysql_result($result3,0,"CardObject.attack_boost") . "@";
			echo mysql_result($result3,0,"Element_Count.El1") . "@";
			echo mysql_result($result3,0,"Element_Count.El2") . "@";
			echo mysql_result($result3,0,"Element_Count.El3") . "@";
			echo mysql_result($result3,0,"Element_Count.El4") . "&";
		
			echo mysql_result($result4,0,"CardObject.card_id") . "@";
			echo mysql_result($result4,0,"CardObject.actual_health") . "@";
			echo mysql_result($result4,0,"CardObject.actual_max_hp") . "@";
			echo mysql_result($result4,0,"CardObject.attack_boost") . "@";
			echo mysql_result($result4,0,"Element_Count.El1") . "@";
			echo mysql_result($result4,0,"Element_Count.El2") . "@";
			echo mysql_result($result4,0,"Element_Count.El3") . "@";
			echo mysql_result($result4,0,"Element_Count.El4") . "&";
			echo mysql_result($result5,0,"COUNT(*)") . "&";
			
			echo mysql_result($result,0,"Player2_HP") . "&";
			echo mysql_result($result,0,"Player1_HP") . "&";
			
			$i = 0;
			while ($i < mysql_numrows($result6))
			{
				echo mysql_result($result6,$i,"Attack.name") . "@";
				echo mysql_result($result6,$i,"Attack.damage") . "@";
				echo mysql_result($result6,$i,"Attack.element_id") . "@";
				echo mysql_result($result6,$i,"Element_Sum.El0") . "@";
				echo mysql_result($result6,$i,"Element_Sum.El1") . "@";
				echo mysql_result($result6,$i,"Element_Sum.El2") . "@";
				echo mysql_result($result6,$i,"Element_Sum.El3") . "@";
				echo mysql_result($result6,$i,"Element_Sum.El4") . "$";
				$i++;
			}
			echo "&";
		}
	}
	
?>