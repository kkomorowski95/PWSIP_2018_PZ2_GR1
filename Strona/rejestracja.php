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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/Style.css">
        
    </head>

    <body>
        <!--Menu-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt="Logo" height="30px" width="30px"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" value="Strona Główna">Strona Główna</a></li>
                        <li class="active"><a href="rejestracja.php" Value="Zarejestruj się!">Zarejestruj się</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="download.php" Value="Download"><span class="glyphicon glyphicon-log-in"></span> Download</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Ogłoszenia-->



        <div class="container-fluid text-center" id="container">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <br>
                   <div class="list-group">
                        <a href="#" class="list-group-item active">
                          Galeria Kart
                        </a>
                        <a href="#" class="list-group-item">Ranking</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-sm-8 text-left">
                    <form method="post">

                        <h1>Rejestracja użytkownika.</h1><br /><br />
                        <div class="form-group">
                        <label for="name_rejestracja">Login</label><br />
                        <input type="text" name="name_rejestracja" class="form-control" placeholder="Podaj login.."><br />
                            </div><?php			
				if(isset($_SESSION['login_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['login_blad'].'</span><br /><br />';
					unset($_SESSION['login_blad']);
				}			
			?>
                            <div class="form-group">
                            <label for="password_rejestracja">Hasło</label><br />
                            <input type="password" name="password_rejestracja" class="form-control" placeholder="Podaj hasło.."><br />
                            </div>
                                <?php			
				if(isset($_SESSION['haslo_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['haslo_blad'].'</span><br /><br />';
					unset($_SESSION['haslo_blad']);
				}			
			?>
                                <div class="form-group">
                                <label for="password_rejestracja2">Powtórz Hasło</label><br />
                                <input type="password" name="password_rejestracja2" class="form-control" placeholder="Ponownie podaj hasło.."><br />
                                <label><input type="checkbox" name="regulamin" />Akcepuję regulamin.</label><br />
                                </div>
                                <?php			
				if(isset($_SESSION['regulamin_blad']))
				{
					echo '<span style="color:red;">'.$_SESSION['regulamin_blad'].'</span><br /><br />';
					unset($_SESSION['regulamin_blad']);
				}		
			?>
                                    <input type="submit" class="btn btn-default" value="Zarejestruj się" />

                    </form>
                </div>
                <div class="col-sm-2 sidenav">
                    <div class="well">
                        <p>ADS</p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <footer class="footer">
                <p id="footernapis">Strona Przygotowania przez Daniel Ciuchta,Sławomir Zadrożny, Oskar Papież</p>
            </footer>
        </div>
    </body>

    </html>