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

		<!-- The data encoding type, enctype, MUST be specified as below -->
		<form enctype="multipart/form-data" action="fileUpload.php" method="POST">
		    <!-- MAX_FILE_SIZE must precede the file input field -->
		    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		    <!-- Name of input element determines name in $_FILES array -->
		    Send this file: <input name="userfile" type="file" />
		    <input type="submit" value="Send File" />
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