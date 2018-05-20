
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
						<li><a href="game.php" Value="Graj online"><span class="glyphicon glyphicon-log-in"></span>Graj online</a></li>
                        <li class="active"><a href="download.php" Value="Pobierz"><span class="glyphicon glyphicon-log-in"></span>Pobierz</a></li>
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
                    <h1>Wybierz platformę na jaką chcesz pobrać aplikację.</h1>
					<h3>Komputery stacjonarne</h3>
                    <table class="table table-hover">
						<tbody>
						<tr>
							<td>32-bit</td>
							<td><a href="download/gra_karciana_x86.zip">Pobierz archiwum</a></td>
						</tr>
						<tr>
							<td>64-bit</td>
							<td><a href="download/gra_karciana_x86_64.zip">Pobierz archiwum</a></td>
						</tr>
						</tbody>
					</table>
					<h3>Systemy mobilne</h3>
					<table class="table table-hover">
						<tbody>
						<tr>
							<td>Android 4.1 i nowszy</td>
							<td><a href="download/dev_build.apk">Pobierz APK</a></td>
						</tr>
						</tbody>
					</table>
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