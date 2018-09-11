<?php
echo '<link rel="stylesheet" type="text/css" href="css/css.css">';
session_start();
if (!isset($_SESSION['login'])){
	header("Refresh:5; url=login.php");
	echo "You must be logged in to view this page.";
}else{
	echo "User has been edited.";
	
	echo '<br /><br /><a href="faultAdminView.php">Back to fault view</a>';
}

?>

