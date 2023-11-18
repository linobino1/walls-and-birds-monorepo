<html>
<body>
 
 
<?php

	$servername = getenv('DB_HOST');
	$username = getenv('DB_USER');
	$password = getenv('DB_PASS');
	$dbname = getenv('DB_NAME');
	$day = $_POST[day];
	$city = $_POST[city];
	$location = $_POST[location];
	$eventname = $_POST[eventname];
	$link = $_POST[link];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8_general_ci");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql="INSERT INTO live (`day`, `city`, `location`, `eventname`, `link`) VALUES ('$day', '$city', '$location', '$eventname', '$link')";

	if ($conn->query($sql) === TRUE) {
    	echo "show added";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

 
	mysql_close($con)
?>

</body>
</html>