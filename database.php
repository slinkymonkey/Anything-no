<?php
/*

author: Rajdeep Barman
dated: 4th April, 2015

*/
class database {
	function __construct() {

	}

	public function dbConnect($serverName, $userName, $password, $dbname) {
		$conn = mysqli_connect($serverName, $userName, $password, $dbname);
		if (!$conn) {
			die("<div style='color: red;font-family: sans-serif;font-size: 12px'>Connection failed: ". mysqli_connect_error()."</div>");
		}
		return $conn;
	}

	public function dbQuery($conn, $queryString) {
		try {
			if (mysqli_query($conn, $queryString) == true) {
				return;
			} else if (mysqli_query($conn, $queryString) == false) {
				echo "<div style='color: red;font-family: sans-serif;font-size: 12px'>Error in query: ".$queryString."</div>";	
			}
		} catch (Exception $e) {
			echo "<div style='color: red;font-family: sans-serif;font-size: 12px'>Query Error: ". $e->getMessage()."</div>";
		}
	}

	public function dbCloseConnect($conn) {
		return mysqli_close($conn);
	}
}
?>