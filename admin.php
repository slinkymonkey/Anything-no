<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="admin.php" method="get">
			<table>
				<tr>
					<td>Name: <input type="text" name="name" value=""/></td>
					<td>IMDB Rating: <input type="number" step="0.1" name="iRating" value=""/></td>
					<td>Cast: <input type="text" name="cast" value=""/></td>
					<td>Year: <input type="number" name="year" value=""/></td>
					<td><input type="submit" name="submit" value="submit"/></td>
				</tr>
			</table>
		</form>
		<script>
			
		</script>
	</body>
</html>
<?php

	include 'database.php';

	if ( $_REQUEST ) {
		$serverName = 'localhost';
		$userName = "rajdeep";
		$password = "barman";
		$dbname = "mdb";
	
		$db = new database();
		$conn = $db->dbConnect($serverName, $userName, $password, $dbname);

		$name = $_GET['name'];
		$rating = $_GET['iRating'];
		$cast = $_GET['cast'];
		$year = $_GET['year'];
		$abc = "insert into movies(name, imdbRating, cast, year) values('".$name."',".$rating.",'".$cast."',".$year.")";
		$db->dbQuery($conn, $abc);
		$db->dbCloseConnect($conn);
	}
		
?>