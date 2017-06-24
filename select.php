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


<?php
require("dbconn.php");

$_searchquery = $_POST['name'];

if($_searchquery === "") {
	$_searchquery = "%";
}
$_searchquery = str_replace("*","%", $_searchquery);
$_searchquery = str_replace("%","", $_searchquery);

$sql = ' select * from Users Where(first LIKE "%' . $_searchquery . '%" OR last LIKE "%' . $_searchquery . '%" OR user LIKE "%' . $_searchquery . '%" OR email LIKE "%' . $_searchquery . '%");';
$result = $conn->query($sql);

if($result->num_rows > 0) {
	echo "<hr>";
	echo "<h5 class='small-margin'>$result->num_rows results found</h5>";
	echo "<hr><br>";

	echo "<p>Idea for this: Output a form instead of this basic html, with the values defaulted in and editable. action=modify.php</p>";
	while($row = $result->fetch_assoc()) {
		echo "<em>User: </em><strong>" . $row['user'] . "</strong>";
		echo "<br>";
		echo "<em>First: </em><strong>" . $row['first'] . "</strong>";
		echo "<br>";
		echo "<em>Last: </em><strong>" . $row['last'] . "</strong>";
		echo "<br>";
		echo "<em>Email: </em><strong>" . $row['email'] . "</strong>";
		echo "<br>";
		echo "<hr>";

	if($result->num_rows == 1) {
		echo '
<form action="modify.php" method="post">
	<fieldset>
		<legend>Need to modify something?</legend>
		';
		echo '<p><label>User? <input type="text" name="user" value=' . $row["user"] . '></label></p>
		
		<p class="small-margin">Field to modify:</p>
		<label class="inline"><input type="radio" name="field" value="user">User</label>
		<label class="inline"><input type="radio" name="field" value="first">First</label>
		<label class="inline"><input type="radio" name="field" value="last">Last</label>
		<label class="inline"><input type="radio" name="field" value="email">Email</label>
		
		<p><label>Value? (what to change it to) <input type="text" name="value"></label></p>
		<input type="submit">
	</fieldset>
</form>

<form action="delete.php" method="post">
	<fieldset>
		<legend>Delete User</legend>
';
		echo '
		<p><label>	Username? <input type="text" name="username" value="'. $row["user"] . '"></label></p>
		<input type="submit">
	</fieldset>
</form>

			';
	}

	}
} else {
	echo "No results for: " . $sql;
}
?>


	<p><a href="..">Go Back...</a></p>

</body>
</html>
