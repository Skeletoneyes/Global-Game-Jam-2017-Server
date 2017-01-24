<?php
require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();
$id = $_GET['gameId'];
?>
<!DOCTYPE html>
<html>
<body>
<?php


$result = $conn->query( "UPDATE Game SET Status = 1 WHERE ID = ".$id);

if( !$result )
{
	echo "false";
}

$result = $conn->query( "UPDATE Player SET Status = 0 WHERE GameID = ".$id );

if( !$result )
{
	echo false;
}
else
{
	echo true;
}