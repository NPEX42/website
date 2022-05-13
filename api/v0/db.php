<?php
	function ConnectToServer($host = "localhost", $user = "george", $pwd = "Magnus123890", $db = "TestDB") {
		$connection = new mysqli($host, $user, $pwd, $db) or die("Connection Failed: %s\n".$conn->error);
		return $connection;
	}


	function DisposeConnection($connection) {
		$connection->close();
	}

	function Query($conn, $query = ""): mysqli_result {
		$conn->real_query($query);
		return $conn->use_result();
	}

	function Rows($conn, $query = "") {
		$result = Query($conn, $query);
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	function Update($conn, $table, $field, $new_value, $condition = "1") {
		$query = "UPDATE " . $table . " SET " . $field . " = " . $new_value . " WHERE " . $condition;
		Query($conn, $conn->real_escape_string($query));
	}
?>
