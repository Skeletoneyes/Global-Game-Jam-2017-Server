<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

$gameId = $_GET['gameId'];

$queryStr = "SELECT * FROM Moves WHERE GameID = ".$gameId;
$result = $conn->query( $queryStr );

if( !$result === TRUE )
{
	echo "Error: " . $queryStr . "<br>" . $conn->error;
}
else
{
	
	echo '<?xml version="1.0" encoding="Windows-1252"?>'
	?>

<MovesParser xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
  <m_moves>
  <?php
  while($row = $result->fetch_assoc() )
	{
		?><MoveXML m_playerId="<?php echo $row['InGamePlayerId']; ?>" m_moveType="<?php echo $row['MoveType']; ?>" m_value1="<?php echo $row['Value1']; ?>" m_value2="<?php echo $row['Value2']; ?>" />
	<?php
	
	}
	?>
  </m_moves>
</MovesParser>
	<?php
}

disconnectDB( $conn );

?>