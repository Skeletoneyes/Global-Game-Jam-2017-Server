<?php
require_once("stank_common.php");
require_once("db_common.php");
 
$conn = connectDB();
$proposed_name = $_GET['playerName'];

?>
<!DOCTYPE html>
<html>
<body>
<?php

echo "Searching for player ".$proposed_name." in room id ".GetRoomId()."<br>";

$result = $conn->query( "SELECT * from Player where GameID = '".GetRoomId()."' AND Name = '".$proposed_name."' ");
if( $result->num_rows == 0 )
{
	$ingameId = 0;
	$result = $conn->query( "SELECT * from Player where GameID = '".GetRoomId()."'");
	if($result )
	{
		$ingameId = $result->num_rows;
	}
	$queryStr = "INSERT INTO Player (ID, GameID, InGamePlayerId, Name) VALUES ( null, ".GetRoomId().", ".$ingameId." ,'".$proposed_name."' )";
	$result = $conn->query( $queryStr );
	if( !$result === TRUE )
	{
		echo "Error: " . $queryStr . "<br>" . $conn->error;
	}
	SetPlayerName( $proposed_name );
	SetPlayerId( $conn->insert_id );
	SetIngamePlayerId( $ingameId );
	
	 
?> 


PLEASE WAIT FOR THE GAME TO START!!!

<script >
 

var targetURL = "<?php echo $homeHTML; ?>".concat("is_game_ready.php?gameID=","<?php echo GetRoomId();?>");

console.log( targetURL );
var num = 0;
function testGameReady( url, cFunction)
{
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
 
function processGameReady( httpObj )
{
	console.log(" REturn from request... output is ".concat( httpObj.responseText ));
	if( httpObj.responseText.trim() == 'true' )
	{
		var destinationURL = "<?php echo $homeHTML; ?>player_ingame.php";
		location.replace(destinationURL);
	}
}

var readyTest = setInterval( testGameReady, 2000, targetURL, processGameReady );
</script>

<p id='output'>null</p>

</script>
</body>
</html>
	<? 
	
}
else 
{
	
	
?>

Name Taken!

<form action='add_player.php'>
Enter Your Name:
<input type='test' name="playerName">
<input type="submit">
</form>

<?php
}
disconnectDB( $conn );

?>