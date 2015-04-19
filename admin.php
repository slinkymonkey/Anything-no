<html>
	<head>
		<title></title>
		<style>
			form[name='consoleData'] textarea {
				width: 400px;
				height: 70px;
			}
		</style>
	</head>
	<body>
		<form action="admin.php" method="get">
			<table>
				<tr>
					<td>Name: <input type="text" name="name" value=""/></td>
					<td>IMDB Rating: <input type="number" step="0.1" name="iRating" value=""/></td>
					<td>Cast: <input type="text" name="cast" value=""/></td>
					<td>Year: <input type="number" name="year" value=""/></td>
					<td><input type="submit" name="submit" value="Single Submit"/></td>
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
		
		<form name="consoleData" action="admin.php" method="post">
			<table>
				<tr><td>All Titles: </td><td><textarea name="titles" value=""></textarea></td></tr>
				<tr><td>All IMDB Rating: </td><td><textarea name="ratings" value=""></textarea></td></tr>
				<tr><td>All Actors(Cast): </td><td><textarea name="actors" value=""></textarea></td></tr>
				<tr><td>All Dates(Year): </td><td><textarea name="dates" value=""></textarea></td></tr>
				<tr><td></td><td><input type="submit" name="submit" value="Submit Console Data"/></td></tr>
			</table>
		</form>

		<script src="consoleData.js">
		</script>
	</body>
</html>
<?php

	include 'database.php';
	$serverName = 'localhost';
	$userName = "rajdeep";
	$password = "barman";
	$dbname = "mdb";

	$db = new database();
	
	if ( isset($_GET['submit']) ) {

		$conn = $db->dbConnect($serverName, $userName, $password, $dbname);

		$name = $_GET['name'];
		$rating = $_GET['iRating'];
		$cast = $_GET['cast'];
		$year = $_GET['year'];
		$abc = "insert into movies(name, imdbRating, cast, year) values('".$name."',".$rating.",'".$cast."',".$year.")";
		$db->dbQuery($conn, $abc);
		$db->dbCloseConnect($conn);
	}

	if ( isset($_POST['submit']) ) {

		$titles = json_decode($_POST['titles']);
		$ratings = json_decode($_POST['ratings']);
		$actors = json_decode($_POST['actors']);
		$dates = json_decode($_POST['dates']);

		$conn = $db->dbConnect($serverName, $userName, $password, $dbname);

		// creating the insert string
		$lengthOfDataArray = count($titles);
		$queryStr = "insert into movies(name, imdbRating, cast, year) values";
		$ing = "";
		for ( $i = 0; $i < $lengthOfDataArray; $i++ ) {
			$title = mysqli_real_escape_string($conn, $titles[$i]);
			$rating = mysqli_real_escape_string($conn, $ratings[$i]);
			$cast = mysqli_real_escape_string($conn, implode(', ', $actors[$i]));
			$date = mysqli_real_escape_string($conn, $dates[$i]);
			$ing = $ing ."('". $title."',". $rating .",'". $cast ."',". $date .")";
			if ($i < $lengthOfDataArray - 1) $ing = $ing .", ";
		}
		$queryString = $queryStr . $ing;
		print $queryString;
		// saving to database
		$db->dbQuery($conn, $queryString);
		$db->dbCloseConnect($conn);

	}
		
?>