<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	
	$game_username = $_POST['username'];
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    mysql_connect($server_name, $server_login, $server_password);
	@mysql_select_db($dbname);
	$query="INSERT INTO MM_Quick VALUES ('" . $game_username . "')";
	mysql_query($query);
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
	