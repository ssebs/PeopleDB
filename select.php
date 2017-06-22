<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">

</head>
<body>
	<h2>Search Results:</h2>

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

	<h4>Need to modify something?</h4>
	<form action="modify.php" method="post">
		User? <input type="text" name="user">
		<br>
		Field to modify:
		<input type="radio" name="field" value="user">user 
		<input type="radio" name="field" value="first">first 
		<input type="radio" name="field" value="last">last 
		<input type="radio" name="field" value="email">email <br>
		
		
		<br>
		Value? (what to change it to) <input type="text" name="value">
		<br>
		<input type="submit">
	</form>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
