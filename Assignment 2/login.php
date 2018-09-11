<?php
$email = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //has the user pressed login
	$email = $_POST['email'];
	$pword = $_POST['password'];

	$email = htmlspecialchars($email);
	$pword = htmlspecialchars($pword);

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
		//====================================================================
		//	End connecting to the database
		//====================================================================
		
		if ($conn) 
		{
			//selecting for members
			$SQL = "SELECT * FROM users WHERE email = '$email' AND password = '$pword'";
		
			$result = mysqli_query($conn, $SQL);
			$num_rows = mysqli_num_rows($result);
		
			while ($row = mysqli_fetch_assoc($result))
			{
				$user_id = $row['id'];
			}
		
			//====================================================
			//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
			//====================================================
			//checking if result returned a match
			if ($result) {
				if ($num_rows > 0) 
				{
					session_start();
					
					$_SESSION['login'] = "1";
					$_SESSION['userId'] = $user_id;
				
					header ("Location: stats.php"); // adds to the counter which counts how many times users have logged in.  Then they're bounced to the logged in page.
				}
				else
				{
				session_start();
				
				$_SESSION['login'] = "";
				echo "Incorrect log in details.";
				}
		}
		else
		{
			$errorMessage = "Error logging on";
		}
			mysqli_close($conn);
		}

	else 
	{
		$errorMessage = "Error connecting to the database";
	}
}

?>


<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<h1>Admin Login</h1>
<p>Enter your username and password to log into your account.</p>

<form name ="form1" method ="POST" action ="login.php">

Username: <input type = "text" name ="email">

<br />
<br />

Password: <input type = "password" name ="password"  >

<br /><br />

<input type = "submit" name = "login"  value = "Login">


</form>
<a href="home.php">Back</a>
<p>
<?php echo $errorMessage;?>
</p>


</body>
</html>