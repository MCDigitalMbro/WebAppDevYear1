<?php
if (isset($_POST['user_edited']))
{
	
	if (isset($_POST['FaultTitle']) && isset($_POST['FaultLocation']) && isset($_POST['FaultDescription']) && isset($_POST['FaultTechnician']) && isset($_POST['FaultStatus']))
	{
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
		
		session_start();
		
		$FaultTitle = mysql_real_escape_string($_POST['FaultTitle']);
		$FaultLocation = mysql_real_escape_string($_POST['FaultLocation']);
		$FaultDescription = mysql_real_escape_string($_POST['FaultDescription']);
		$FaultTechnician = mysql_real_escape_string($_POST['FaultTechnician']);
		$FaultStatus = mysql_real_escape_string($_POST['FaultStatus']);
		
		
		//$sql statement
		$sql = "INSERT INTO faults (FaultTitle, FaultLocation, FaultDescription, FaultTechnician, FaultStatus) VALUES ('$FaultTitle', '$FaultLocation', '$FaultDescription', '$FaultTechnician', '$FaultStatus')";
		
		$result = mysqli_query($conn, $sql);
		
		if(!$result)
		{
			//echoing and exiting if there is an error
			$error = 'Error fetching user: ' . mysqli_error($result);
			echo $error;
			exit();
		}
		
		header('location: home.php');
	}
	else
	{
		echo "You have not completed one of the mandatory fields.";
	}
}
else
{
	
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
		
		if ($conn)
		{	
			
			include 'report.html';
			exit();

		}
	}
?>