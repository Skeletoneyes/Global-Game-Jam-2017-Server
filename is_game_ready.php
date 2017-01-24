<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();


$id = $_GET['gameID'];

$result = $conn->query( "SELECT * from Game where ID = '".$id."'");
$roomStatus = false;
if( $result )
{
	$row = $result->fetch_assoc();
	$roomStatus = ($row['Status'] == 1);
}

if( $roomStatus )
{
?>
true
<?php
}
else
{
?>
false
<?php
}

disconnectDB( $conn );

?>