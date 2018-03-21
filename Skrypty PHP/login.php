<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	$game_username = $_POST['username'];
	$game_password = $_POST['password'];
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query="SELECT password, connect FROM  Player WHERE name='" . $game_username . "'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);

	$i=0;
	if ($num!=0)
	{
		while ($i < $num) 
		{
			if (mysql_result($result,$i,"connect") == 0)
			{
				if (mysql_result($result,$i,"password") == $game_password)
				{
					echo "0";
					$query="UPDATE Player SET last_connect ='" . time() ."', connect = 1 WHERE name='" . $game_username . "'";
					mysql_query($query);
				}
				else
				{
					echo "2";
				}
				$i++;
			}
			else
			{
				echo "3";
			}
		}
	}
	else
	{
		echo "1";
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
	