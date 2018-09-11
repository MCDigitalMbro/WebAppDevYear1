<?php

	//====================================================================
		//	connect to the database
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
?>
<html>
<head>
<title>Edit Fault</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>

<form name="faultDeleteForm" action="delete.php" method="post">
	<input type="hidden" name="fault_deleted" value="1" />
	<h1>Delete Fault</h1>
	<p>You are deleting fault ID: <?php echo $_POST['fault_id']; ?></p>
	<input type="hidden" name="fault_id" value="<?php echo $faultID; ?>" />
	<p><b>ARE YOU SURE YOU WANT TO DO THIS?</b></p>
	
	<p><b>This process is irreversible.</b></p>
	
	<input type="submit" value="Delete Fault" />
	<input type="button" onclick="window.location.href='faultAdminView.php'" value="Cancel" />




</body>
</html>