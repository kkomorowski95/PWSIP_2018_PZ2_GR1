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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>The Next Card Game</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
            <div id="header">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

                    <a class="navbar-brand" href="#">The Next Card Game</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/Strona/index.php" value="Strona Główna">Strona Główna
                <span class="sr-only">(current)</span>
              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Strona/rejestracja.php" Value="Zarejestruj się!">Zarejestruj się</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Strona/download.php" Value="Download">Download</a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>

            <div class="main">
                <h2>Aktualności</h2>
            </div>

        </div>



        <?php

	if(isset($_SESSION['blad']))	
		echo $_SESSION['blad'];
	
?>


            <!-- Bootstrap core JavaScript -->
            <script src="jquery/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
