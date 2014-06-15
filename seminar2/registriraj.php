<?php
	session_start();
			
//retrieve our data from POST
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
 
$con=mysqli_connect("localhost","root","","seminar2");
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
			}
			mysqli_set_charset ( $con , "utf8");
			  
	

	

 
 if (empty($username or $password1 or $password2 or $email )) {
    echo '<script>alert("Neka polja nisu unesena!");window.location = "registracija.php"</script>';
	}
	else if(strlen($username)<4){
	echo '<script>alert("Prekratko korisnicko ime!");window.location= "registracija.php"</script>';
	}

	else if(($password1 !== $password2) OR (strlen($password1)<8)){
    echo '<script>alert("Lozinke se ne podudaraju ili je prekratka!");window.location="registracija.php"</script>';
	}
	else {
	
	
	$conn = mysqli_connect("localhost","root","","seminar2");
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
			}
			
						$user = mysql_real_escape_string($username);
						$password = mysql_real_escape_string($password2);
			
				$check="SELECT * FROM users WHERE name = '$user'";
				$rs = mysqli_query($conn,$check);
				$data = mysqli_fetch_array($rs, MYSQLI_NUM);
				if($data[0] > 1) {
					echo '<script>alert("Korisnicko ime se vec koristi!");window.location="registracija.php"</script>';
				}
				else
				{


 
		$newuser = "INSERT INTO users ( name, email, password ) VALUES ( '$username','$email',md5('$password'))";
		mysqli_query($conn,$newuser);
		echo '<script>alert("Uspjesna registracija!");window.location = "prijava.php"</script>';

		mysqli_close($conn);
 		}
	}
 


 






?>