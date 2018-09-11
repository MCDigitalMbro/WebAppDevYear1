<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<h1>Home Page</h1>
<?php
session_start();
if (isset($_SESSION['login'])){
	echo '<a href="logout.php">Log Out</a><br /><br />';
	echo '<a href="adminControl.php"><b>Admin Control</b></a><br /><br />';
}
else{
	echo '<a href="login.php">Admin Login</a><br /><br />';
}
?>

<a href="reportFault.php">Report Fault</a>
<br /><br />
<a href="viewFaults.php">View Reported Faults</a>

</body>
</html>