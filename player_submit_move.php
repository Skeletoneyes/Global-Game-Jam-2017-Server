<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

$id = $_GET['id'];
$ingameId = $_GET['inGameId'];
$gameId = $_GET['gameID'];
$MoveType = $_GET['MoveType'];
$Value1 = $_GET['Value1'];
$Value2 = $_GET['Value2'];

$values = "(".$gameId.",".$id." ,".$ingameId.",0,".$MoveType.",".$Value1.",".$Value2.")";

$queryStr = "INSERT INTO Moves (GameID, PlayerID, InGamePlayerId, TurnNum, MoveType, Value1, Value2 ) VALUES ".$values;

$result = $conn->query( $queryStr);


if( !$result === TRUE )
{
	echo "Error: " . $queryStr . "<br>" . $conn->error;
}
else
{
	$queryStr = "UPDATE Player  SET Status = 0 WHERE ID = ".$id;
	$result = $conn->query( $queryStr);
	
	if( !$result === TRUE )
{
		echo "Error: " . $queryStr . "<br>" . $conn->error;
	}
	
	echo "Success";
}



disconnectDB( $conn );

?>