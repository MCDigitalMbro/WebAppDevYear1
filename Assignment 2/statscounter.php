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

$sql = 'SELECT * FROM stats WHERE page = "home"';

$result = mysqli_query($conn, $sql);

if (!$sql)
{
	//echoing and exiting if there is an error
	$error = 'Error fetching stats: ' . mysqli_error($conn);
	echo $error;
	exit();
}

$row = mysqli_fetch_assoc ($result);

$hits = $row['hits'];


// This is where I test stuff






}
?>
<html>
<head>
<title>Stats Counter</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<h1>Website Statistics</h1>
<p>Number of times users have logged in: <?php echo $hits; ?></p>
<br />
<a href="adminControl.php">Back</a>


</body>
</html>













