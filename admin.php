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
// 

	
	
	if ( $_REQUEST ) {
		$serverName = 'localhost';
		$userName = "root";
		$password = "";
		$dbname = "mdb";
	
	//connecting
	$conn = mysqli_connect($serverName, $userName, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: ". mysqli_connect_error());
	}
	echo "Connection successful". "\n";
	$name = $_GET['name'];
	$rating = $_GET['iRating'];
	$cast = $_GET['cast'];
	$year = $_GET['year'];
	$abc = "insert into movies(name, imdbRating, cast, year) values('".$name."',".$rating.",'".$cast."',".$year.")";
	echo $abc;
	try {
		mysqli_query($conn, $abc);	
	} catch (Exception $e) {
		echo 'Error'. $e->getMessage(). "\n";
	}
	mysqli_close($conn);
	}
	
	
?>