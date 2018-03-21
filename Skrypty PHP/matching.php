<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query="SELECT * FROM MM_Quick";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	if ($num!=0)
	{
		while ($i < $num) 
		{
			if ($i+1 < $num)
			{
				$query2="SELECT MAX(ID) FROM Pair_Matched";
				$result2=mysql_query($query2);
				echo mysql_result($result2, 0, "MAX(ID)");
				if (mysql_result($result2, 0, "MAX(ID)") == "NULL")
				{
					$idnumber = 1;
				}
				else
				{
					$idnumber = intval(mysql_result($result2, 0, "MAX(ID)"),10) + 1;
				}
				$tim = time() + 20;
				$query2="INSERT INTO Pair_Matched VALUES (" . $idnumber . ", '" . mysql_result($result,$i,"Player_name") . "', '" . mysql_result($result,$i+1,"Player_name") . "', " . $tim . ", 0, 0, 0)";
				mysql_query($query2);
				$query2="DELETE FROM MM_Quick WHERE Player_name = '" . mysql_result($result,$i,"Player_name") . "' OR Player_name = '" . mysql_result($result,$i+1,"Player_name") . "'";
				mysql_query($query2);
			}
			$i=$i+2;
		}
		include 'creating_table.php';
	}
	mysql_close();
	
	#if ($conn->connect_error)
	#{
	#	echo ("Not Connected");
	#}
	#else
	#{
	#	$sql = "SELECT * FROM  grupa2.Player;";
	#	$result = $conn->query($sql);
	#	echo $result->num_row;
	#	if ($result->num_row > 0) 
	#	{
	#		// output data of each row
	#		while($row = $result->fetch_assoc()) 
	#		{
	#			echo $row["name"];
	#		}
	#	} 
	#	else 
	#	{
	#		echo "0 results";
	#	}		
	#	mysqli_close($conn);
	#}

	
?>
	