<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.small-margin {
	margin: 2px auto;
}

</style>
</head>
<body>
	<h2>Search Results:</h2>
	<hr>


<?php
require("dbconn.php");

$_user = $_POST['name'];

if($_user === "") {
	$_user = "%";
}
$_user = str_replace("*","%", $_user);


$sql = "SELECT * FROM Users WHERE user LIKE '$_user';";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "User: " . $row['user'];
		echo "<br>";
		echo "First: " . $row['first'];
		echo "<br>";
		echo "Last: " . $row['last'];
		echo "<br>";
		echo "Email: " . $row['email'];
		echo "<br>";
		echo "<hr>";

	}
} else {
	echo "No results for: " . $sql;
}
?>


	<p><a href="..">Go Back...</a></p>

</body>
</html>
