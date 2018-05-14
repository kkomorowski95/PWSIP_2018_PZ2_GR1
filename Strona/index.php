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
        <title>The Next Card Game</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/Style.css">
    </head>

    <body>

        <!--LOGOWANIE-->
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



        <!--Menu-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt="Logo" height="30px" width="30px"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php" value="Strona Główna">Strona Główna</a></li>
                        <li><a href="rejestracja.php" Value="Zarejestruj się!">Zarejestruj się</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="download.php" Value="Download"><span class="glyphicon glyphicon-log-in"></span> Download</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Ogłoszenia-->



        <div class="container-fluid text-center">
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
                    <h1>Aktualności</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <hr>
                    <h3>Test</h3>
                    <p>Lorem ipsum...</p>
                </div>
                <div class="col-sm-2 sidenav">
                    <br>
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
        




        <?php

	if(isset($_SESSION['blad']))	
		echo $_SESSION['blad'];
	
?>
    </body>

    </html>