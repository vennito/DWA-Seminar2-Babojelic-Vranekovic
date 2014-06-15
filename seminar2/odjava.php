<?php
	session_start();
	$_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600,'/', '', 0, 0);
	echo '<script>alert("Uspjesna odjava!");window.location = "index.php"</script>';
	die();
?>