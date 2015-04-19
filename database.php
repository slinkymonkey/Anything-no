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
			$result = mysqli_query($conn, $queryString);
			if ( $result === true) {
				echo "<div style='color: green;font-family: sans-serif;font-size: 12px'>Query run Successfully: ".$queryString."</div>";
				return $result;
			} else if ( $result === false) {
				echo "<div style='color: red;font-family: sans-serif;font-size: 12px'>Error in query: ".$queryString."</div>";
				return $result;	
			} else {
				echo "<div style='color: green;font-family: sans-serif;font-size: 12px'>Query run Successfully. You get a return object</div>";
				return mysqli_query($conn, $queryString);
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