<?php
session_start();
if (!isset($_SESSION['login'])){
	header("Refresh:5; url=login.php");
	echo "You must be logged in to view this page.";
}
else{
//====================================================================
//	Connect to the database
//====================================================================
// these are the connection details for a “localhost” setup
$servername = "localhost";
$username = "root";
$password = "";
$database = "u27";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check database connection
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
//====================================================================
//	End connecting to the database
//====================================================================
}
?>

<html>
<head>
<title>Admin Control</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>

<h1>Admin Control</h1>
<a href="statscounter.php">View Stats</a>
<br /><br />
<a href="home.php">Home</a>
<br /><br />
<a href="faultAdminView.php">Fault Admin View</a>

</body>
</html>