<?php
	class Json {
		private $response;
		public function __construct($init_response = []) {
			$response = $init_response;
		}

		function __set($name, $value) {
			$response[$name] = $value;
		}

		function __get($name) {
			return $response[$name];
		}

		function send() {
			header('Content-type: application/json');
			echo json_encode($response);
		}
	}

	function json_from_request() {
		$json = file_get_contents('php://input');
		return new Json(json_decode($json))
	}
?>
