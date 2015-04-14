<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="admin.php" method="post">
			<table>
				<tr>
					<td>Name: <input type="text" name="name" value=""/></td>
					<td>IMDB Rating: <input type="number" name="iRating" value=""/></td>
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
	
	//connecting
	$conn = mysqli_connect($serverName, $userName, $password);
	
	if (!$conn) {
		die("Connection failed: ". mysqli_connect_error());
	}
	echo "Connection successful";
	
		$abc = "insert into movietable(name, imdbRating, cast, year) values(".$_POST['name']."," .$_POST['iRating'].",". $_POST['cast'].",". $_POST['year'].")";
		mysqli_query($conn, $abc);
	}
	
	
?>