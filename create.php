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

$_first = $_GET['firstname'];
$_last = $_GET['lastname'];
$_user = $_GET['username'];
$_email = $_GET['email'];
$_uid = $_GET['userid'];

if ($_user == "" || $_uid == "") {
	echo "<script>
alert('User not created! Enter in the needed info!');
window.location.href='index.php';
</script>";
	
} else {
	$sql = "INSERT INTO Users VALUES($_uid,'$_first','$_last','$_user','$_email', TRUE);";
	
	$result = $conn->query($sql);
	if ($result === TRUE) {
		echo "<script>
	alert('Successfully created user.');
	window.location.href='select.php?" . $_user ."';
	</script>";

		date_default_timezone_set("America/Los_Angeles");
		$_datetime = date('Y-m-d H:i:s');
		$_file = '_UsersChangeLog_';
		$_outstr = $_datetime . "," . $_uid . "," . $_user . "," . $_first . "," . $_last . "," . $_email . "\n";
		
		file_put_contents($_file, $_outstr, FILE_APPEND);

	} else {
		echo "ERROR: " . $conn->error;
		echo "<br>" . $sql;
	}
	
}
?>

	<p><a href="..">Go Back...</a></p>

</body>
</html>
