<html>
<body>
 
 
<?php

	$servername = getenv('OLD_DB_HOST');
	$username = getenv('OLD_DB_USER');
	$password = getenv('OLD_DB_PASS');
	$dbname = getenv('OLD_DB_NAME');
	$day = $_POST[day];


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8_general_ci");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql="DELETE FROM `live` WHERE `day` = '$day'";

	if ($conn->query($sql) === TRUE) {
		echo "all shows on '$day' deleted from database";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

 
	mysql_close($con)
?>

</body>
</html>