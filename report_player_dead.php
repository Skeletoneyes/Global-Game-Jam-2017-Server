<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

$playerId = $_GET['playerId'];
$gameId = $_GET['gameId'];

$queryStr = "UPDATE Player SET Status = 2 WHERE InGamePlayerID = ".$playerId." AND GameID = ".$gameId;
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