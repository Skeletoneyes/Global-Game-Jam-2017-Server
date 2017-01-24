<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

$id = $_GET['gameId'];
$queryStr = "UPDATE Player SET Status = 1 WHERE Status = 0 AND GameID = ".$id;

$result = $conn->query( $queryStr );

if( !$result === TRUE )
{
	echo "Error: " . $queryStr . "<br>" . $conn->error;
}

$queryStr =  "DELETE FROM Moves WHERE GameID = ".$id;
$result = $conn->query( $queryStr );

if( !$result === TRUE )
{
	echo "Error: " . $queryStr . "<br>" . $conn->error;
}
else
{
	echo "Success";
}

disconnectDB( $conn );

?>