#<?php
	include "db.php";
	function DisplayUsers($conn) {
		$rows = Rows($conn, "SELECT * FROM Users");
		echo "<ul>";
		foreach ($rows as $row) {
			echo "<li>" . $row["ID"] . " - " . $row["USERNAME"] . "</li>";
		}
		echo "</ul>";
	}

	function UpdateUser($conn) {
		$s_user_id = $_GET['id'];
		if ($s_user_id == null) {http_response_code(400);}
		$user_id = intval($s_user_id);
		Update($conn, "`Users`", "`API_KEY`", "`API_KEY` = 'OK'", "`User`.`ID` = " . $user_id);
	}

	$conn = ConnectToServer();

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
  	case 'POST':
    		UpdateUser($conn);
    		break;
  	case 'GET':
    		DisplayUsers($conn);
    		break;

	}
	DisposeConnection($conn);
?>
