<?php
	session_start();


	if(isset($_SESSION['login']) AND $_SESSION['login'] == 1){
		header( 'Location: index.php' ) ;
				
	}else{
		if($_POST){
			$con=mysqli_connect("localhost","root","","seminar2");
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
			}

			mysqli_set_charset ( $con , "utf8");
			$username = mysql_real_escape_string($_POST['username']);
			$password = md5(mysql_real_escape_string($_POST['password']));
			
			$sql = "SELECT COUNT(*) FROM users WHERE name='$username' AND password = '$password'";
			$result = mysqli_query($con,$sql);
			$count = $result->fetch_row();
			
			if($count[0] == 1){
				$sql = "SELECT id, admin, name FROM users WHERE name='$username' AND password = '$password'";
				$result = mysqli_query($con,$sql);
				$id = $result->fetch_row();
				$_SESSION["login"] = "1";
				$_SESSION["id"] = $id[0];
				$_SESSION['admin']	= $id[1];
				$_SESSION['ime']	= $username;
				
				
				if(isset($_SESSION['admin']) AND $_SESSION['admin'] != 1){
				echo '<script>alert("Prijava uspjesna!");</script>';
				header( 'Location: index.php' ) ;
				}else{
					echo '<script>alert("Prijava uspjesna!");</script>';
					header( 'Location: admin.php' ) ;
					die();
							
				}
				}else{
					echo '<script>alert("Pogresno korisnicko ime ili lozinka!");window.location = "prijava.php"</script>';
					die();
			}
		}
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
	   		<section id="page-feature-image">
            			<div class="row">
                       				<a href="#link_aktualnog_filma"><img src="images/banner.jpg" alt="" /></a>
					</div>
	   		</section>

		<div class="container">
		    			<section id="page-introduction" class="row">
              				<div class="eight columns">
                                     <form method="POST" action="prijava.php">
    		   	   					Korisničko ime<br><input type="text" name="username" size="35"><br>
   									Lozinka<br><input type="password" name="password" size="35"><br>
    								<input class="button" type="submit" name="submit" value="Login" />
    								<a class="red-btn" href="registracija.php" title="Registracija"> Registracija</a>
    							</form>
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

</html>