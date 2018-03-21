<?php
	$server_name = "pwsip.i-exe.pl";
	$server_login = "grupa2";
	$server_password = "g2da9ad";
	$dbname = "grupa2";
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    $link = mysql_connect($server_name, $server_login, $server_password);
	mysql_select_db($dbname, $link);
	echo mysql_errno($link) . ": " . mysql_error($link). "\n";
	$query="SELECT password, connect FROM  Player WHERE name='test01'";
	echo mysql_errno($link) . ": " . mysql_error($link). "\n";
	$result=mysql_query($query, $link);
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
	