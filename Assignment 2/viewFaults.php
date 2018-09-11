<?php
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


// This gets the ID of the first fault in the database so we know where to start from.
$sql = 'SELECT FaultID FROM faults ORDER BY FaultID DESC LIMIT 1';
$result = mysqli_query($conn, $sql);
if (!$sql)
{
	//echoing and exiting if there is an error
	$error = 'Error fetching stats: ' . mysqli_error($conn);
	echo $error;
	exit();
}
$row = mysqli_fetch_assoc ($result);

// Checks if sql has returned an empty array implying that there are no faults in the faults table.
if (empty($row['FaultID'])) {
	echo "<h1>View Faults</h1>";
	echo "<b>Looks like there are no faults.</b><br />";
	
	
}		//There's no point in doing any of the table if the above if is true.
else{
		// This is the first ID in the database.
		$faultFirstID = $row['FaultID'];

		
		
		

	// This gets the ID of the last fault in the database so we know where to end.
	$sql = 'SELECT FaultID FROM faults ORDER BY FaultID ASC LIMIT 1';
	$result = mysqli_query($conn, $sql);
	if (!$sql)
	{
		//echoing and exiting if there is an error
		$error = 'Error fetching stats: ' . mysqli_error($conn);
		echo $error;
		exit();
	}
	$row = mysqli_fetch_assoc ($result);

	// This is the first ID in the database.
	$faultLastID = $row['FaultID'];

	echo "<h1>View Faults</h1>";


	// This is the start of the styling of the HTML table.
	echo "<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid DeepSkyBlue ;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: DeepSkyBlue;
	}
	</style>";


	// This starts the table.
	echo "<table>";

	// This sets the headers for each column.
	echo "<tr>";
	echo "<th>Fault ID</th>";
	echo "<th>Fault Title</th>";
	echo "<th>Fault Location</th>";
	echo "<th>Fault Description</th>";
	echo "<th>Fault Technician</th>";
	echo "<th>Fault Status</th>";
	echo "</tr>";


	// This loop generates a HTML table row code for each fault.
	for ($i = $faultFirstID; $i >= $faultLastID; $i = --$i){
		
		$sql = 'SELECT * FROM faults WHERE FaultID = "'.$i.'"';

		$result = mysqli_query($conn, $sql);

		if (!$sql)
		{
			// Echoing an error message and exiting if there is an error.
			$error = 'Error fetching faults: ' . mysqli_error($conn);
			echo $error;
			exit();
		}

		$row = mysqli_fetch_assoc($result);
		
		
		// This checks if SQL has returned nothing for whatever reason
		while (empty($row)){
			$sql = 'SELECT * FROM faults WHERE FaultID = "'.$i.'"';

			$result = mysqli_query($conn, $sql);

			if (!$sql)
			{
				// Echoing an error message and exiting if there is an error.
				$error = 'Error fetching faults: ' . mysqli_error($conn);
				echo $error;
				exit();
			}
			
			$row = mysqli_fetch_assoc($result);
			--$i;
		}
		
		
		
		$faultID = $row['FaultID'];
		$faultTitle = $row['FaultTitle'];
		$faultLocation = $row['FaultLocation'];
		$faultDescription = $row['FaultDescription'];
		$faultTechnician = $row['FaultTechnician'];
		$faultStatus = $row['FaultStatus'];
		
		// This generates a new row each loop.
		echo "<tr>";
		echo "<td>".$faultID."</td>";
		echo "<td>".$faultTitle."</td>";
		echo "<td>".$faultLocation."</td>";
		echo "<td>".$faultDescription."</td>";
		echo "<td>".$faultTechnician."</td>";
		echo "<td>".$faultStatus."</td>";
		echo "</tr>";
		
	}

	// This closes the table.
	echo "</tr>";
	echo "</table>";
}



?>

<html>
<head>
<title>View Faults</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>

<br /><a href="home.php">Back</a><br />

</body>
</html>