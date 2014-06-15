<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<?php
		session_start();
			//dodati login redirect na stolice
				
			$con=mysqli_connect("localhost","root","","seminar2");
			if (mysqli_connect_errno())
					{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if(!isset($_GET['id'])){
				echo '<script>alert("Niste odabrali film!");window.location = "index.php"</script>';
				die();
			}else{
				mysqli_set_charset ( $con , "utf8");
				$id = mysql_real_escape_string($_GET['id']);

				$sql = "SELECT * FROM filmovi WHERE idFilm='$id'";
				$result = mysqli_query($con,$sql);	
				$row = $result->fetch_assoc();
				
				
				$dani = array(
					1 => "PON",
					2 => "UTO",
					3 => "SRI",
					4 => "ČET",
					5 => "PET",
					6 => "SUB",
					7 => "NED",
				);
				$timestamp = strtotime(date('Y-m-d', time()));
				$datum = strtotime($row['datumPrikaza']);
				$dana  = $row['prikaza'];
				$datumisteka = $datum + ($dana*86400);
				$danaostalo = ($datumisteka-$timestamp)/86400;
				$i = 0;
				while($i <= $danaostalo && $i < 7){
					$vrijeme = $timestamp + ($i*86400);
					$dan = date("N", $vrijeme);
					$ispisdatumi[$i]['datum'] 	= date("d.m.", $vrijeme );
					$ispisdatumi[$i]['dan'] 		= $dani[$dan];
					$ispisdatumi[$i]['timestamp']	= $vrijeme;
					$i++;
				}
			}
		
?>
<head>

	<meta charset="utf-8">
	<title>Kino d.o.o</title>


	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/960grid.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/filmovi.js"></script>

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

									<?php
									
									echo
									'<div class="five columns">
										<img id="velika_slika" src="'.$row['slika'].'" alt="slika filma" />
									</div>
									<div class="eleven columns">
										<h2>'.$row['imeFilma'].'</h2>

										<h5>Žanr:</h5>
										<h7>'.$row['zanr'].'</h7></br>
										<h5>Godina:</h5>
										<h7>'.$row['godina'].'.</h7></br>
										<h5>Trajanje:</h5>
										<h7>'.$row['trajanje'].' minuta</h7></br>
										<h5>Redatelj:</h5>
										<h7>'.$row['redatelj'].'</h7></br>
										<h5>Uloge:</h5>
										<h7>'.$row['uloge'].'</h7></br>
										<h5>Opis:</h5>
										<h7>'.$row['opis'].'</h7></br>
										</br>
										<h5>Početak projekcije:</h5>
										<h6>'.$row['sati'].'  sati</h6></br>
										
										<h7>Odaberi dan</h7><br />';
										foreach($ispisdatumi as $index => $ispisdatum){
											if($index ==  0){
												echo '<a class="tabsdatum active" rel="'.$ispisdatum['timestamp'].'" href="javascript:;">'.$ispisdatum['dan'].', '.$ispisdatum['datum'].'</a>';
											}else{
												echo '<a class="tabsdatum" rel="'.$ispisdatum['timestamp'].'" href="javascript:;">'.$ispisdatum['dan'].', '.$ispisdatum['datum'].'</a>';
											}
										}
									echo '</div>';
									 ?>
               				
						</section>

						<section id="page-introduction" class="row">
                        	<?php
							echo '
								<div class="ten columns">
								<br/>
								</div>
								<div class="six columns">
											<a class="ulaznice-btn" rel="'.$id.'" href="javascript:;">Rezerviraj ulaznicu &rarr;</a>
								</div>';
							?>
                        </section>
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