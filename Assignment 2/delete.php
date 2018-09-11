<?php
session_start();
if (!isset($_SESSION['login'])){
	header("Refresh:5; url=login.php");
	echo "You must be logged in to view this page.";
}
else{
	if (isset($_POST['fault_deleted']))
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
		
		$faultID = $_POST['fault_id'];
		
		$sql = 'DELETE FROM faults WHERE FaultID = "'.$faultID.'"';
		
		$result = mysqli_query($conn, $sql);
		
		if(!$result)
		{
			//echoing  and exiting if there is an error
			$error = 'Error fetching fault: ' . mysqli_error($result);
			echo $error;
			exit();
		}
		
		header('location: useredited.php');
		
		
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
		//loading the fault you want to delete, getting the id from the URL
		
		$faultID = $_POST['fault_id'];
			
		include 'deleteForm.php';
		exit();

	}
}
}
?>