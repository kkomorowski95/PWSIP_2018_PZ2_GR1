<?php

	session_start();

	if(isset(($_POST['password_rejestracja'])))
	{
		$rejestracja=true;		
		$rejestracja_name = $_POST['name_rejestracja'];		
		
		//Długość nameu oraz polskie znaki
		if(strlen($rejestracja_name)<5)
		{			
			$rejestracja=false;
			$_SESSION['login_blad']="Login musi posiadać minimalnie 5 znaków.";			
			
		}
		else if(ctype_alnum($rejestracja_name)==false)
		{
			$rejestracja=false;
			$_SESSION['login_blad']="Login nie może posiadać polskich znaków.";
		}
		
		//Długość hasła
		$rejestracja_password=$_POST['password_rejestracja'];
		$rejestracja_password2=$_POST['password_rejestracja2'];
		if(strlen($rejestracja_password)<7)
		{
			$rejestracja=false;
			$_SESSION['haslo_blad']="Hasło musi zawierać przynajmniej 7 znaków";
		}
		else if(ctype_alnum($rejestracja_password)==false)
		{
			$rejestracja=false;
			$_SESSION['haslo_blad']="Hasło nie może posiadać polskich znaków.";
		}
		
		//Identyczne hasła
		if($rejestracja_password!=$rejestracja_password2)
		{
			$rejestracja=false;
			$_SESSION['haslo_blad']="Hasła nie są takie same.";
		}		
		
		//Akceptacja regulaminu
		if(!isset($_POST['regulamin']))
		{
			$rejestracja=false;
			$_SESSION['regulamin_blad']="Zaakceptuj regulamin.";
		}
		
		require_once "connect.php";
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			$polaczenie -> query('SET NAMES utf8');
			$polaczenie -> query('SET CHARACTER_SET utf8_polish_ci');
			
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$wynik=$polaczenie->query("SELECT name FROM player WHERE name='$rejestracja_name'");				
				if(!$wynik)
				{
					throw new Exception($polaczenie->error);
				}					
				
				$ile_loginow=$wynik->num_rows;
				if($ile_loginow>0)
				{
					$rejestracja=false;
					$_SESSION['login_blad']="Podany login jest zajęty.";
				}	
				
				if($rejestracja==true)
				{
					if($polaczenie->query("INSERT INTO player VALUES
					('$rejestracja_name','$rejestracja_password',0,0,0,0,0,0,0,0,1,1)"))
					{
					$_SESSION['rejestracjaok']=true;
					header('Location: rejestracjaok.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				$polaczenie->close();
			
			}
		}
		
		catch(Exception $ex)
		{
			echo 'Bład';
			echo '<br/>Informacja deweloperska: '.$ex;
		}		
		
	}
?>

<!DOCTYPE HTML>
<html lang="pl-PL">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Rejestracja</title>
	<link rel="stylesheet" href=style.css />	
</head>

<body>
	<div>
		<form method="post">	
		
			Rejestracja użytkownika.<br /><br />
			<label for="name_rejestracja">Login</label><br />
			<input type="text" name="name_rejestracja" placeholder="Podaj login.."><br />
			<?php			
				if(isset($_SESSION['login_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['login_blad'].'</span><br /><br />';
					unset($_SESSION['login_blad']);
				}			
			?>			
			<label for="password_rejestracja">Hasło</label>
			<input type="password" name="password_rejestracja" placeholder="Podaj hasło.."><br />
			<?php			
				if(isset($_SESSION['haslo_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['haslo_blad'].'</span><br /><br />';
					unset($_SESSION['haslo_blad']);
				}			
			?>
			<label for="password_rejestracja2">Powtórz Hasło</label>
			<input type="password" name="password_rejestracja2" placeholder="Ponownie podaj hasło..">			
			<input type="checkbox" name="regulamin" />Akcepuję regulamin.<br />
			<?php			
				if(isset($_SESSION['regulamin_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['regulamin_blad'].'</span><br /><br />';
					unset($_SESSION['regulamin_blad']);
				}		
			?>	
			<input type="submit" value="Zarejestruj się" />
			
		</form>
	</div>	

</body>
</html>