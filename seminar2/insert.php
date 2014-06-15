<?php


      $con=mysqli_connect("localhost","root","","seminar2");
      // Check connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
        }
        mysqli_set_charset($con, "utf8");
      $sql="INSERT INTO dojmovnik(ime, prezime, email  , poruka) VALUES
      ('$_POST[ime]','$_POST[prezime]','$_POST[email]','$_POST[poruka]')";

      if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
		echo '<script>alert("Podaci su upisani!")</script>';
		die('<script type="text/javascript">window.location=\'kontakt.php\';</script>');

     

?>