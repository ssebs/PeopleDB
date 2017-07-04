<?php
require("dbconn.php");

$_uid  = $_POST['uid'];
$_user  = $_POST['username'];
$_first  = $_POST['firstname'];
$_last  = $_POST['lastname'];
$_email  = $_POST['emailaddr'];

date_default_timezone_set("America/Los_Angeles");
$_datetime = date('Y-m-d H:i:s');
$_file = '_UsersChangeLog_';
$_outstr = $_datetime . "," . $_uid . "," . $_user . "," . $_first . "," . $_last . "," . $_email . "\n";

file_put_contents($_file, $_outstr, FILE_APPEND);


$sql = "UPDATE Users SET 
	user='$_user',
	first='$_first',
	last='$_last',
	email='$_email'

WHERE uid = '$_uid';";


$result = $conn->query($sql);
if ($result === TRUE) {
	echo "Successfully modified user: " . "<strong>" . $_user . "</strong>";
} else {
	echo "ERROR: " . $conn->error;
}

echo "<script>
alert('Successfully updated info.');
window.location.href='select.php?" . $_user ."';
</script>";
?>
