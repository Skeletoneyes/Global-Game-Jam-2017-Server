<?php

session_start();


function SetRoomKey( $str )
{
	$_SESSION["room_key"] = $str;
}

function GetRoomKey( )
{
	return $_SESSION["room_key"];
}

function SetPlayerName( $str )
{
	$_SESSION["player_name"] = $str;
}

function GetPlayerName( )
{
	return $_SESSION["player_name"];
}

function SetRoomId( $id )
{
	$_SESSION["room_id"] = $id;
}

function GetRoomId( )
{
	return $_SESSION["room_id"];
}

function SetPlayerId( $id )
{
	$_SESSION["player_id"] = $id;
}

function GetPlayerId( )
{
	return $_SESSION["player_id"];
}

function SetIngamePlayerId( $id )
{
	$_SESSION["ingame_player_id"] = $id;
}

function GetIngamePlayerId( )
{
	return $_SESSION["ingame_player_id"];
}

$homeHTML = "http://d1177671-26682.site.myhosting.com/";

$maxPlayers = 4;
// player status
// 0 nothing
// 1 awaiting input
// 2 dead
?>