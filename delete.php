<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<h2>Disable Results:</h2>

<?php
require("dbconn.php");

$_uid = $_POST['userid'];
$_user = $_POST['username'];
date_default_timezone_set("America/Los_Angeles");
$_datetime = date('Y-m-d H:i:s');
$_file = '_UsersChangeLog_';
$_outstr = $_datetime . "," . $_user . ", " . $_uid . ", disabled\n";

file_put_contents($_file, $_outstr, FILE_APPEND);


$sql = "UPDATE Users SET 
	disabled=TRUE

WHERE uid = '$_uid';";


$result = $conn->query($sql);
if ($result === TRUE) {
	echo "Successfully modified user: " . "<strong>" . $_user . "</strong>";
} else {
	echo "ERROR: " . $conn->error;
}

echo "<script>
alert('Successfully updated info.');
window.location.href='index.php';
</script>";

?>

	<p><a href="..">Go Back...</a></p>

</body>
</html>

