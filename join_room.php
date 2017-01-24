<?php
require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

SetRoomKey( $_GET['roomKey'] );

$result = $conn->query( "SELECT * from Game where RmKey = '".GetRoomKey()."'");

?>
<?php
include './dev/header.php';
?>
<body>
<?php

$message = 'undefined';

if( !$result || $result->num_rows == 0 )
{
	$message = "Room not found!";
	exit;
}

$row = $result->fetch_assoc();
SetRoomId( $row["ID"] );

$message = "<br>Found room id ".GetRoomId()."<br>";

disconnectDB($conn);

include './dev/NamePrompt.php'; 
?>
</body>
</html>


