<?php
	include("db.php");
	include("json.php");

	$json = json_from_request();
	$db = ConnectToServer();

	$result = Query($db, "SELECT * FROM `users` WHERE `users`.`ID` = " . $json->user_id . ";");
	$user = Rows($db, $result);
	DisposeConnection($db);
	$response = new Json($user);
	$response->send();

?>
