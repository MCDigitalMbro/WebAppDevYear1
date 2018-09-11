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

	<form name="faultEditForm" action="edit.php" method="post">
		<input type="hidden" name="fault_edited" value="1" />
		<p>Editing fault ID: <?php echo $_POST['fault_id']; ?></p>
		<input type="hidden" name="fault_id" value="<?php echo $faultID; ?>" />
		<p>Fault Title</p>
		<input type="text" name="faultTitle" value ="<?php echo $faultTitle; ?>" />
		<p>Fault Location</p>
		<input type="text" name="faultLocation" value ="<?php echo $faultLocation; ?>" />
		<p>Fault Description</p>
		<input type="text" name="faultDescription" value ="<?php echo $faultDescription; ?>" />
		<p>Fault Technician</p>
		<input type="text" name="faultTechnician" value ="<?php echo $faultTechnician; ?>" />
		<p>Fault Status</p>
		<input type="text" name="faultStatus" value ="<?php echo $faultStatus; ?>" />
		<br /><br />
		<input type="submit" value="Edit Info" />
	</form>
	<a href="faultAdminView.php">Back</a>
</body>
</html>