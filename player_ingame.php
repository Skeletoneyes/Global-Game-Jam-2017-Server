<?php
require_once("stank_common.php");
require_once("db_common.php");
?>
<!DOCTYPE html>
<html>
<?php
include './dev/header.php';
?>
<body>
<h1>Simultanks</h1>
<div id='GameData'></div>
<script>
var targetURL = "<?php echo $homeHTML; ?>".concat("get_player_status.php?id=","<?php echo GetPlayerId();?>");

console.log( targetURL );

var num = 0;
var curStatus = -1;
var angleValue = 50;

var playerInputForm = '\
	<h2> Enter your move! </h2>\
	<form class="pure-form" name="moveForm">\
		<fieldset>\
			<div class="pure-control-group">\
				<p class="text-signin center">Power</p>\
				<div id="powerSlider" class=".selector"></div>\
				<p id="powerLabel" class="center"></p>\
			</div>\
			<div class="pure-control-group">\
				<p class="text-signin center">Angle</p>\
				<div id="slider"></div>\
			</div>\
		</fieldset>\
		<div class="pure-u-1-2 left">\
			<div style="margin-left:5px; margin-right:5px;">\
				<input type="text" name="moveType" value="SHOOT" id="button-join" tabindex="3" class="button-signin button-blue button-xlarge pure-button" onclick="return submitMove(0)">\
			</div>\
		</div>\
		<div class="pure-u-1-2 right">\
			<div style="margin-left:5px; margin-right:5px;">\
				<input type="text" name="moveType" value="JUMP" id="button-join" tabindex="3" class="button-signin button-blue button-xlarge pure-button" onclick="return submitMove(1)">\
			</div>\
		</div>\
	</form>\
	';

function updatePlayerStatus( url, cFunction)
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
 
function processPlayerStatus( httpObj )
{
	console.log(" REturn from request... output is ".concat( httpObj.responseText, " curStatus  ", curStatus ));
	var lastStatus = parseInt( httpObj.responseText.trim() );
	if(curStatus != lastStatus )
	{
		curStatus = lastStatus;
		if( curStatus == 0 )
		{
			console.log("processign as status 0" );
			document.getElementById("GameData").innerHTML = "<h2>Waiting for game.</h2>";
		}
		else if( curStatus == 1 )
		{
			console.log("processign as status 1" );
			document.getElementById("GameData").innerHTML = playerInputForm;
			$("#slider").roundSlider("enable");
			$("#slider").roundSlider({
				handleShape: "round",
				width: 40,
				radius: 100,
				value: 50,
				startAngle: 340,
				endAngle: "+220"
			});
			$("#slider").roundSlider({
				change: function (e) {
					angleValue = e.value;
				}
			});
			$( function() {
				$( "#powerSlider" ).slider();
			} );
			$( "#powerSlider" ).slider({
			  change: function( event, ui ) {
				  $('#powerLabel').text($('#powerSlider').slider("value"));
				  console.log($('#powerSlider').slider("value"));
			  }
			});
		}
		else if ( curStatus == 2 )
		{
			console.log("processign as status 2" );
			document.getElementById("GameData").innerHTML = "<h2>You Died! Go grab a drink.</h2>";	
		}
	}
}

var readyTest = setInterval( updatePlayerStatus, 2000, targetURL, processPlayerStatus );


function submitMove(mt)
{
	var moveType = mt;
	var val1 = angleValue;
	var val2 = $('#powerSlider').slider("value");
	
	var moveSubmitURL = "<?php echo $homeHTML; ?>".concat("player_submit_move.php?id=<?php echo GetPlayerId();?>&inGameId=<?php echo GetIngamePlayerId(); ?>&gameID=<?php echo GetRoomId(); ?>");
	moveSubmitURL = moveSubmitURL.concat( "&MoveType=",moveType,"&Value1=",val1,"&Value2=",val2);
	
	console.log( moveSubmitURL );
	
	var xhttp;
	xhttp=new XMLHttpRequest();

	xhttp.open("GET", moveSubmitURL, true);
	xhttp.send();

	document.getElementById("GameData").innerHTML = "Submitted!";	
	
	return false;
}
</script>
