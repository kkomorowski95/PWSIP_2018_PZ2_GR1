<?php
	$server_name = "userdb1";
	$server_login = "716915_IgA";
	$server_password = "hn4Dv4J44ejqny";
	$dbname = "716915_IgA";
	#Dane w ciagu zapisane są następująco:
	#@ oddziela ko
	#$ oddziela rekordy
	#& odziela tabele
	#Ciąg dane@jakieś$kolejne@dane$&nastepne@dane$&
	#Oznacza:
	# Tabela1
	#  		dane|jakieś
	# 	 kolejne|dane
	# Tabela2
	#  	nastepne|dane
	#Zaprogramować należy nawet na sztywno pobieranie ilości kolumn (można fajnie oddzielić w C# najpierw według tabel (&), później każdą kolumnę według rekordów ($) a później według danych komórek (@))
	
	
	#$conn = new mysqli($server_name, $server_login, $server_password);
    $link = mysql_connect($server_name, $server_login, $server_password);
	mysql_select_db($dbname, $link);
	mysql_set_charset("utf8", $link);
	#Wczytywanie kart
	$query="Select * FROM Card ORDER BY ID ASC";
	$result=mysql_query($query, $link);
	$i = 0;
	while ($i < mysql_numrows($result))
	{
		echo mysql_result($result,$i,"id") . "@";
		echo mysql_result($result,$i,"name") . "@";
		echo mysql_result($result,$i,"description") . "@";
		echo mysql_result($result,$i,"element_id") . "@";
		echo mysql_result($result,$i,"attack_ids") . "@";
		echo mysql_result($result,$i,"health") . "@";
		echo mysql_result($result,$i,"type") . "@";
		echo "$";
		$i++;
	}
	echo "&";
	#Wczytywanie list ataków
	$query="SELECT * FROM Attack_Ids ORDER BY ID ASC";
	$result=mysql_query($query,$link);
	$i=0;
	while ($i < mysql_numrows($result))
	{
		echo mysql_result($result,$i,"id") . "@";
		echo mysql_result($result,$i,"attack1") . "@";
		echo mysql_result($result,$i,"attack2") . "@";
		echo mysql_result($result,$i,"attack3") . "@";
		echo mysql_result($result,$i,"attack4") . "@";
		echo "$";
		$i++;
	}
	echo "&";
	#Wczytywanie ataków
	$query="SELECT * FROM Attack ORDER BY ID ASC";
	$result=mysql_query($query,$link);
	$i=0;
	while ($i < mysql_numrows($result))
	{
		echo mysql_result($result,$i,"id") . "@";
		echo mysql_result($result,$i,"name") . "@";
		echo mysql_result($result,$i,"description") . "@";
		echo mysql_result($result,$i,"damage") . "@";
		echo mysql_result($result,$i,"element_id") . "@";
		echo mysql_result($result,$i,"Element_req") . "@";
		echo "$";
		$i++;
	}
	echo "&";
	#Wczytywanie elementów
	$query="SELECT * FROM Element ORDER BY ID ASC";
	$result=mysql_query($query,$link);
	$i=0;
	while ($i < mysql_numrows($result))
	{
		echo mysql_result($result,$i,"id") . "@";
		echo mysql_result($result,$i,"name") . "@";
		echo "$";
		$i++;
	}
	echo "&";
	#Wczytywanie wymagań elementów
	$query="SELECT * FROM Element_Sum ORDER BY ID ASC";
	$result=mysql_query($query,$link);
	$i=0;
	while ($i < mysql_numrows($result))
	{
		echo mysql_result($result,$i,"ID") . "@";
		echo mysql_result($result,$i,"El0") . "@";
		echo mysql_result($result,$i,"El1") . "@";
		echo mysql_result($result,$i,"El2") . "@";
		echo mysql_result($result,$i,"El3") . "@";
		echo mysql_result($result,$i,"El4") . "@";
		echo "$";
		$i++;
	}
	echo "&";
	
	
?>
	