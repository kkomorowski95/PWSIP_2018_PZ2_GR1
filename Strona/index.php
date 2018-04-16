<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl-PL">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Strona główna</title>
	<link rel="stylesheet" href=style.css />
</head>

<body>	
	
		
<!--	<section class="logowanie">
		<div>
			<form action="zaloguj.php" method="post">
			
				<div id="logowanie">
				<input type="text" name="login" placeholder="Login..">
				<input type="password" name="haslo" placeholder="Hasło..">	
				</div>			
			
			<input type="submit" value="Zaloguj się" >
			
		</div>
	</section> 
-->	
	<div id="container">
	
		<div id="lewy">
			<ul>
				<li>
					<a href="/projekt/index.php">
						<input type="button" Value="Strona Główna" /></a>
				</li>
				<li>
					<a href="/projekt/rejestracja.php">
						<input type="button" value="Zarejestruj się!"/> </a>
				</li>
				<li>
					<a href="/projekt/download.php">
						<input type="button" Value="Download" /></a>
				</li>
			</ul>
		</div>
		
		<div id="aktualnosci">
			<h2>Aktualności</h2>				
		</div>		
		
		<div id="prawy">
		
		</div>
		
		
	</div>
		

		
<?php

	if(isset($_SESSION['blad']))	
		echo $_SESSION['blad'];
	
?>
		</form>
	</div>
	


</body>
</html>