<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">
	<meta http-equiv="refresh" content="3,url=http://ssebs-centos/">

</head>
<body>
	<h2>Deletion Results:</h2>

<?php
require("dbconn.php");

$_user = $_POST['username'];


$sql = "DELETE FROM Users WHERE user = '$_user';";


$result = $conn->query($sql);
if ($result === TRUE) {
	echo "Successfully deleted user: " . "<strong>" . $_user . "</strong>";
} else {
	echo "ERROR: " . $conn->error;
}



?>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
