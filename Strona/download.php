
<!DOCTYPE HTML>
<html lang="pl-PL">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Projekt - rejestracja udana</title>
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
                    <h1>Pobieranie jeszcze nie jest dostępne.</h1>
                    <p>Za chwilę zostaniesz przekierowany na stronę główną.</p>
                    <hr>
                    <h3>Test</h3>
                    <p>Lorem ipsum...</p>
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

	<?php
		header('Refresh: 5; url=http://localhost/Strona/index.php');
	?> 
</body>
</html>