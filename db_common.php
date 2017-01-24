<?php


function connectDB ()
{
	$username="u1177671_stank";$password="simultank";$database="db1177671_simultank";$host="10.16.113.11";
	$conn = new mysqli($host,$username,$password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}

function disconnectDB($conn)
{
	mysqli_close($conn);
}

?>