<?php
		session_start();
		
		

       $con=mysqli_connect("localhost","root","","seminar2");
          // Check connection
        if (mysqli_connect_errno())
                {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
        }

		mysqli_set_charset ( $con , "utf8");
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



</head>

<body class="about-us">

	<header id="header-global" role="banner">

		<div class="container">

			<div class="row">

				<div class="header-logo three columns">

					<div id="logo"><a href="index.php" title="Kino"><img src="images/logo1.jpg" width="100" height="64" alt="Header Logo" /></a></div>

				</div>

				<nav id="header-navigation" class="thirteen columns" role="navigation">

					<ul id="navigation">
						<li><a href="index.php" title="Početna">Početna</a></li>
						<li><a href="index.php#filmovi" title="Filmovi">Filmovi</a></li>
						<li><a href="index.php#filmovi" title="Ulaznice">Ulaznice</a></li>
						<li><a href="#" title="Kontakt">Kontakt</a></li>

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
	   		<section id="page-feature-image">
            			<div class="row">
                       				<a href="#link_aktualnog_filma"><img src="images/banner.jpg" alt="" /></a>
					</div>
	   		</section>

		<div class="container">
		    		  <div class="sixteen columns">

					<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.466401859314!2d15.7090665!3d45.8019169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765cbf7be81b661%3A0x835dbfeb37a68fa9!2sTrg+kralja+Tomislava!5e0!3m2!1shr!2shr!4v1402679793173"></iframe>
					</div>

					<div class="row">

						<div class="eight columns alpha">
						
						<h4>Vaši dojmovi, upiti, kritike i slično..</h4>

							<form id="contact-form" action="insert.php" method="post">

								<input name="ime" type="text" placeholder="Vaše ime">
								<input name="prezime" type="text" placeholder="Vaše prezime">

							    <input name="email" type="email" placeholder="Vaš mail">

							    <textarea name="poruka" placeholder="Napišite svoju poruku, dojmove i slično..."></textarea>

							    <input id="submit" name="submit" type="submit" value="Pošalji">

							</form>

							<div id="response"></div>

						</div>

						<div class="eight columns omega">

							<address id="contact-details">

								<ul>
							    	<li>Adresa: <h6>Trg Kralja Tomislava, 10430 Samobor</h6></li>
							        <li>Kontakt: <h6>01 2000 100</h6>	</li>
							        <li>E-mail: <a href="#">kinoo@superkino.com</a></li>
							    </ul>

							</address>

						</div>
		</div>
		</div>


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