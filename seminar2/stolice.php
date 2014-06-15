<?php
	session_start();
	
	if(!isset($_SESSION['login']) OR $_SESSION['login'] != "1"){
		echo '<script>alert("Niste prijavljeni!");window.location = "prijava.php"</script>';
		die();
	}else{
		$con=mysqli_connect("localhost","root","","seminar2");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		mysqli_set_charset ( $con , "utf8");
		if($_POST){
			if(!isset($_POST['idflim']) OR !isset($_POST['dan']) OR !isset($_POST['stolice'])){
				echo '<script>alert("Greška kod rezervacije!");window.location = "index.php"</script>';
				die();
			}else{
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
					$id = mysql_real_escape_string($_POST['idflim']);
					$dan = mysql_real_escape_string($_POST['dan']);
					
					$con2=mysqli_connect("localhost","root","","seminar2");
					if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						die();
					}else{	
					mysqli_set_charset ( $con2 , "utf8");
					$sql = "SELECT * FROM filmovi WHERE idFilm='$id'";
					$result = mysqli_query($con2,$sql);	
					$film = $result->fetch_assoc();
					}
					
					
					$rezervacija = $_REQUEST['stolice'];
					$i = 0;
					foreach($rezervacija AS $stolica){
						$stolice[$i] = $stolica;
						$i++;
					}
					foreach($stolice AS $mjesto){
						$datum = date("Y-m-d",$dan);
						$sql = "INSERT INTO rezervacije (idkorisnika, idfilma, imefilma, stolica, datum) VALUES ('".$_SESSION['ime']."', '".$id."','".$film['imeFilma']."', '".$mjesto."', '".$datum."');";
						$result = mysqli_query($con,$sql);
					}
					echo 1;
					die();
				}
			}
		}else{		
			if(!isset($_GET['id']) OR !isset($_GET['dan'])){
				echo '<script>alert("Niste odabrali film!");window.location = "index.php"</script>';
				die();
			}else{
				$id = mysql_real_escape_string($_GET['id']);
				$dan = mysql_real_escape_string($_GET['dan']);

				$sql = "SELECT * FROM filmovi WHERE idFilm='$id'";
				$rezultat = mysqli_query($con,$sql);
				$red = $rezultat->fetch_assoc();
				
				$datum = date("Y-m-d",$dan);
				$sql = "SELECT stolica FROM rezervacije WHERE idfilma='$id' AND datum = '$datum'";
				$result = mysqli_query($con,$sql);
				$i = 0;
				if(mysqli_num_rows($result) < 1){
					$stolice = array();
				}
				while($row = $result->fetch_assoc()){
					$stolice[$i] = $row['stolica'];
					$i++;
				}
			}
		}
	}
?>
<html>
<head>


<meta charset="utf-8">
<title>Kino d.o.o</title>


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/960grid.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/style.css">

<link href='http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery-1.4.1.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/stolice.js"></script>


 
 



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
						<li><a href="kontakt.html" title="Kontakt">Kontakt</a></li>

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
              	<div class="sixteen columns">

					<?php 
						echo  '<h2>'.$red['imeFilma'].' u '.$red['sati'].'</h2>' ; 
					?>

               	</div>
		    		<section id="page-introduction" class="row">
              			<div class="twelve columns">

                            <h4> Odaberite sjedeća mjesta:</h4>
								<div id="holder">
									<div id="platno">
									<h4>Platno</h4>
									</div>
									<ul  id="place">
									</ul>    
								</div>
								<div style="float:left;"> 
								<ul id="seatDescription">
									<li style="background:url('images/dostupno.png') no-repeat scroll 0 0 transparent;">Dostupna sjedala</li>
									<li style="background:url('images/zauzeto.png') no-repeat scroll 0 0 transparent;">Rezervirana sjedala</li>
									<li style="background:url('images/odabrano.png') no-repeat scroll 0 0 transparent;">Odabrana sjedala</li>
								</ul>
								</div>
								<div style="clear:both;width:100%">
									<input type="button" id="btnShowNew" value="Odabrana sjedala" />
									<input type="button" id="btnShow" value="Sva zauzeta sjedala" />           
								</div>

               			</div>

						<div class="three columns">
							<?php 
								echo '<a id="rezerviraj" class="ulaznice-btn" rel="'.$id.'" href="javascript:;">Rezerviraj  &rarr;</a>';
								echo '<input type="hidden" id="vrijeme" value="'.$dan.'"/>';
							?>
						</div>
						</section>

						<section id="page-introduction" class="row">
              			<div class="sixteen columns">

						<h5>Zbog mogućih gužvi na blagajnama za preuzimanje rezervacija tijekom vikenda, savjetujemo vam da preuzmete rezervacije i ranije od uobičajenih 30 minuta prije početka predstave.</h5>

               				</div>
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
<script>
	var bookedSeats = [<?php echo implode(', ', $stolice) ?>];
</script>
</html>