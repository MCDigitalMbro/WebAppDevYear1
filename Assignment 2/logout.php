<?PHP
	session_start();
	if (!isset($_SESSION['login'])){
		$message = "You must be logged in to view this page.";
	}
	else if (session_destroy()){
		$message = "You have logged out.";
	}
?>

<html>
	<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	</head>
	<body>
	<?php echo $message;
	header( "Refresh:5; url=home.php");
	?>
	<p>You should be redirected to the Home page in 5 seconds or you can click <a href="home.php">here</a>.</p>
	</body>
</html>