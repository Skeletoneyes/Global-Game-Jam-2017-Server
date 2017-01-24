<?php

require_once("db_common.php");
$conn = connectDB();

function RandomString()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 4; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}







$randstring = '';
do
{
	$randstring = RandomString();
	$result = $conn->query( "SELECT * FROM Game WHERE RmKey = '".$randstring."'");
	$tableCount = $result->num_rows;
} while($tableCount > 0);


$result = $conn->query( "INSERT INTO Game (ID, RmKey, SecretKey, Status )  VALUES (null, '".$randstring."', 'blah', 0 )");

echo '<?xml version="1.0" encoding="Windows-1252"?>';

?>

<GameParser xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
	<m_game>
<?php 
if( $result )
{
		?>
		<GameXML m_id="<?php echo $conn->insert_id; ?>" m_key="<?php echo $randstring; ?>" />
		<?php
}
?>
</m_game>
</GameParser>

<?php
	


disconnectDB($conn);
?>








