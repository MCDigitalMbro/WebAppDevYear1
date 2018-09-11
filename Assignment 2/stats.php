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

$sql = 'UPDATE stats SET hits = hits + 1 WHERE page = "home"';

$result = mysqli_query($conn, $sql);

if (!$result)
{
	//echoing and exiting if there is an error
	$error = 'Error counting hits: ' . mysqli_error($result);
	echo $error;
	exit();
}




header ("Location: home.php");
}
?>