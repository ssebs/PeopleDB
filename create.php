<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<h2>Creation Results:</h2>

<?php
require("dbconn.php");

$_first = $_POST['firstname'];
$_last = $_POST['lastname'];
$_user = $_POST['username'];
$_email = $_POST['email'];


$sql = "INSERT INTO Users(first, last, user, email) VALUES('$_first','$_last','$_user','$_email');";


$result = $conn->query($sql);
if ($result === TRUE) {
	echo "Record created successfully for user: " . "<strong>" . $_user . "</strong>";
} else {
	echo "ERROR: " . $conn->error;
}



?>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
