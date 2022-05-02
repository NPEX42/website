<?php
	class Database {
		private $connection;

		function __construct($host = "localhost", $user = null, $pwd = null, $db = null) {
			if (!isset($user)) {
				$user = $_ENV["DB_USER"];
			}

			if (!isset($pwd)) {
				$user = $_ENV["DB_PWD"];
			}

			if (!isset($db)) {
				$user = $_ENV["DEFAULT_DB"];
			}


			$this->connection = new mysqli($host, $user, $pwd, $db) or die("Connection Failed: %s\n".$conn->error);
		}

		function dispose() {
			$this->connection->close();
		}

		function query($query = "") {
			$this->connection->real_query($this->connection->real_escape_string($query));
			return $this->connection->use_result();
		}

		function rows($query = "") {
			return $this->query($query)->fetch_all(MYSQLI_ASSOC);
		}
	}
?>
