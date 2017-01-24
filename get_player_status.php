<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();
$id = $_GET['id'];


$result = $conn->query( "SELECT * from Player where ID = ".$id );
$roomStatus = false;
if( $result && $result->num_rows == 1 )
{
	$row = $result->fetch_assoc();
	echo $row['Status'];
	
}
else
{
	echo -1;
}

disconnectDB( $conn );

?>