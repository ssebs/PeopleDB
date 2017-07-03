<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">
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

if ($_user == "") {
	echo "<script>
alert('User not created! Enter in the needed info!');
window.location.href='index.php';
</script>";
	
} else {
	$sql = "INSERT INTO Users(first, last, user, email, disabled) VALUES('$_first','$_last','$_user','$_email', FALSE);";
	
	$result = $conn->query($sql);
	if ($result === TRUE) {
		echo "<script>
	alert('Successfully created user.');
	window.location.href='select.php?" . $_user ."';
	</script>";

		date_default_timezone_set("America/Los_Angeles");
		$_datetime = date('Y-m-d H:i:s');
		$_file = '_UsersChangeLog_';
		$_outstr = $_datetime . "," . $_id . "," . $_user . "," . $_first . "," . $_last . "," . $_email . "\n";
		
		file_put_contents($_file, $_outstr, FILE_APPEND);

	} else {
		echo "ERROR: " . $conn->error;
	}
	
}
?>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
