<?php
	session_start();
	
	if(!isset($_SESSION['admin']) OR $_SESSION['admin'] != "1"){
		echo '<script>alert("Niste prijavljeni kao administrator!");window.location = "prijava.php"</script>';
		die();
	}else{
		$con=mysqli_connect("localhost","root","","seminar2");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		mysqli_set_charset ( $con , "utf8");

        $sql = "SELECT * FROM rezervacije;";
        $result = mysqli_query($con,$sql);

		}
	
?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
	<title>Kino d.o.o</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/960grid.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/style.css">

	<link href='http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/tablica.js"></script>


</head>

<body class="about-us">

	<header id="header-global" role="banner">

		<div class="container">

			<div class="row">

				<div class="header-logo four columns">

					<div id="logo">
					<a href="index.php" title="Kino"><img src="images/logo1.jpg" width="100" height="64" alt="Header Logo" /></a>
					</div>
					<div id="logo_text">
					<h2>Kino d.o.o.</h2>
					</div>
				</div>

				<nav id="header-navigation" class="twelve columns" role="navigation">

					<ul id="navigation">
						<li><a href="index.php" title="Početna">Početna</a></li>
						<li><a href="index.php#filmovi" title="Filmovi">Filmovi</a></li>
						<li><a href="index.php#filmovi" title="Ulaznice">Ulaznice</a></li>
						<li><a href="kontakt.php" title="Kontakt">Kontakt</a></li>

					</ul>

				</nav>

			</div>
			<div class="prijava-link">

				
			<?php 
				  if(isset($_SESSION['login'])){
						echo '<h7 class="korisnik-btn"> korisnik:&nbsp '.$_SESSION['ime'].'</h7>';
						echo '<a class="prijava-btn"  href="odjava.php">Odjava</a>';
				}else{
				echo '<a class="prijava-btn" href="prijava.php">Prijava</a>';
				}
			?>

			   </div>
		</div>
</header>

	<div id="main">
	   		

		<div class="container">
		    			<section id="page-introduction" class="row">
              				<div class="three columns">

										<a class="ulaznice-btn" href="#">Admin izbornik</a>
										<a class="ulaznice-btn" href="rezervacije.php">Popis rezervacija</a>
										<a class="ulaznice-btn" href="korisnici.php">Popis korisnika</a>
										<a class="ulaznice-btn" href="dojmovnik.php">Poruke korisnika</a>
																
               				</div>
							
							            
							<div class="ten columns">						
							</div>
						</section>


	</div>

	<footer id="footer-global" role="contentinfo" class="clearfix">

		<div id="footer-details">

						<div class="container">

				<div class="one-third column">

					<a class="footer-btn" href="#filmovi">Ulaznice</a>

					<p>Rezervirajte svoju ulaznicu</p>

				</div>

				<div class="one-third column">

					<a class="footer-btn" href="#filmovi">Filmovi</a>

					<p>Pregled filmova</p>

				</div>

				<div class="one-third column">

					<a class="footer-btn" href="kontakt.php">Kontakt</a>

					<p>Kontaktirajte nas i napišite dojmove</p>

				</div>

			</div>
		</div>

		<div class="container">

			<div class="sixteen columns">

	  			<p id="copyright-details">&copy;Seminar2: Mihael Babojelić i Valentino Vraneković.</p>

	  		</div>

		</div>

	</footer>

	<div id="back-to-top" style="display: block;">

		<a href="#"></a>

	</div>

</body>

</html>