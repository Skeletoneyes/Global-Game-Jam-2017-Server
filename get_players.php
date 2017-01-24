<?php

require_once("stank_common.php");
require_once("db_common.php");

$conn = connectDB();

$id = $_GET['gameID'];

$result = $conn->query( "SELECT * from Player where GameID = '".$id."'");

echo '<?xml version="1.0" encoding="Windows-1252"?>';

?>

<PlayerParser xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
	<m_players>
<?php 
if( $result )
{
	while( $row = $result->fetch_assoc() )
	{
		?>
		<PlayerXML m_id="<?php echo $row['InGamePlayerId']; ?>" m_name="<?php echo $row['Name']; ?>" />
		<?php
	}
}



disconnectDB( $conn);
?>
</m_players>
</PlayerParser>