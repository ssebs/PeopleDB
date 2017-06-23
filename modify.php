<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css    ">
	<meta http-equiv="refresh" content="3,url=http://ssebs-centos/">
	
</head>
<body>
	<h2>Modification Results:</h2>

<?php
require("dbconn.php");

$_field = $_POST['field'];
$_value = $_POST['value'];
$_user  = $_POST['user'];

$sql = "UPDATE Users SET $_field='$_value' WHERE user = '$_user';";


$result = $conn->query($sql);
if ($result === TRUE) {
	echo "Successfully modified user: " . "<strong>" . $_user . "</strong>";
} else {
	echo "ERROR: " . $conn->error;
}
?>
	
	<p><a href="..">Go Back...</a></p>

</body>
</html>
