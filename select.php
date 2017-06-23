<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">
<style>
.inline {
	display: inline;	
}
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

	<form action="modify.php" method="post">
		<fieldset>
			<legend>Need to modify something?</legend>
			<p><label>User? <input type="text" name="user"></label></p>
	
			<p class="small-margin">Field to modify:</p>
			<label class="inline"><input type="radio" name="field" value="user">User</label>
			<label class="inline"><input type="radio" name="field" value="first">First</label>
			<label class="inline"><input type="radio" name="field" value="last">Last</label>
			<label class="inline"><input type="radio" name="field" value="email">Email</label>
			
			<p><label>Value? (what to change it to) <input type="text" name="value"></label></p>
			<input type="submit">
		</fieldset>
	</form>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
