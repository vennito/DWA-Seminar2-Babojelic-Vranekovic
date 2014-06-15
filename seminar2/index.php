<!DOCTYPE html>
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

        $sql = "SELECT * FROM filmovi;";
        $result = mysqli_query($con,$sql);
		$i = 0;
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $film[$row['idFilm']]['imeFilma']  =  $row['imeFilma'];
			$film[$row['idFilm']]['kratak_opis']  =  $row['kratak_opis'];  
			$film[$row['idFilm']]['m_slika']  =  $row['m_slika'];
			$film[$row['idFilm']]['idFilm']  =  $row['idFilm'];
			$film[$row['idFilm']]['visible']  =  $row['visible'];
			$i++;
        }
?>

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
						<li><a href="#" title="Početna">Početna</a></li>
						<li><a href="#filmovi" title="Filmovi">Filmovi</a></li>
						<li><a href="#filmovi" title="Ulaznice">Ulaznice</a></li>
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
	   		<div class="sixteen columns" id="page-feature-image">
            			
			<a href="#link_aktualnog_filma"><img src="images/uvodna1.jpg" alt="" /></a>
					
	   		</div>

		<div class="container">
		    			<section id="page-introduction" class="row">
              				<div class="sixteen columns">
                                     <h1 class="feature-title"><span>Pregled filmova:</span></h1>
               				</div>
						</section>
		</div>

		<section id="filmovi" class="filmovi">

			<div class="container">

				<div class="row">
				
				<?php
				
				
				foreach($film as $index => $filmovi)  {
						if($filmovi['visible']==1){
						echo '<div class="film one-third column">

								<div class="thumbnail">
								<a href="odabrani_film.php?id='.$filmovi["idFilm"].'"><img src="'.$filmovi['m_slika'].'" alt="" /></a>
								</div>
								<div class="o_filmu">
								<h2>'.$filmovi["imeFilma"].'</h2>
								<p>'.$filmovi["kratak_opis"].'</p>
								
								</div>
							<div class="vise">	
							<p>Kliknite na "više" za detalje i ulaznice:</p>
							<a class="red-btn" href="odabrani_film.php?id='.$filmovi["idFilm"].'">Više ..</a>
							</div>
							</div>';
					}else $filmovi++;
					
				}
				?>

				</div>
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