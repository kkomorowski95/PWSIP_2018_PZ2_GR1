<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	$checkin = $_POST['checkin'];
	$game_username  = $_POST['user'];
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    if ($checkin == "okoń")
	{
		mysql_connect($server_name, $server_login, $server_password);
		@mysql_select_db($dbname);
		$query="SELECT connect, last_connect FROM Player WHERE name='" . $game_username . "'";
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		mysql_close();
		$i=0;
		if ($num!=0)
		{
			while ($i < $num) 
			{
				if (mysql_result($result,$i,"connect") == 1)
				{
					$actualdate = time()-mysql_result($result,$i,"last_connect");
					if ($actualdate <= 60)
					{
						mysql_connect($server_name, $server_login, $server_password);
						@mysql_select_db($dbname);
						$query="UPDATE Player SET last_connect ='" . time() . "'WHERE name='" . $game_username . "'";
						mysql_query($query);
						mysql_close();
						echo "0";
					}
					else
					{
						echo "1";
					}
				}
				else
				{
					echo "2";
				}
				$i++;
			}
		}
		else
		{
			echo "3";
		}
	}
	
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
	