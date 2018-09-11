<?php
session_start();
if (!isset($_SESSION['login'])){
	header("Refresh:5; url=login.php");
	echo "You must be logged in to view this page.";
}
else{
if (isset($_POST['fault_edited']))
{
	if (isset($_POST['faultTitle']) && isset($_POST['faultLocation']) && isset($_POST['faultDescription']) && isset($_POST['faultTechnician']) && isset($_POST['faultStatus']))
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
		$faultID = $_POST['fault_id'];
		$faultTitle  = $_POST['faultTitle'];
		$faultLocation = $_POST['faultLocation'];
		$faultDescription = $_POST['faultDescription'];
		$faultTechnician = $_POST['faultTechnician'];
		$faultStatus = $_POST['faultStatus'];
		
		
		//$sql statement
		$sql = "UPDATE faults SET FaultTitle = '".$faultTitle."',FaultLocation = '".$faultLocation."',FaultDescription = '".$faultDescription."',FaultTechnician = '".$faultTechnician."',FaultStatus = '".$faultStatus."' WHERE FaultID = '".$faultID."'";
		
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
			//loading the fault you want to edit, getting the id from the URL
			//session_start();
			$faultID = $_POST['fault_id'];
			$sql = 'SELECT * FROM faults WHERE FaultID="'.$faultID.'"';
			$result = mysqli_query($conn, $sql);
			if(!$sql)
			{
				//echoing  and exiting if there is an error
				$error = 'Error fetching fault: ' . mysqli_error($sql);
				echo $error;
				exit();
			}
			//for as long as we have returned results we cycle round the loop the cycle
			
			$row = mysqli_fetch_assoc($result);		
			$faultTitle = $row['FaultTitle'];
			$faultLocation = $row['FaultLocation'];
			$faultDescription = $row['FaultDescription'];
			$faultTechnician = $row['FaultTechnician'];
			$faultStatus = $row['FaultStatus'];
			
			include 'editform.html.php';
			exit();

		}
	}
}
?>