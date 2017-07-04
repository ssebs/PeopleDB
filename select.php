<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.small-margin {
	margin: 2px auto;
}

</style>
</head>
<body>


<?php
require("dbconn.php");

if(@$_POST['name'] == NULL) {
	$_searchquery = $_SERVER['QUERY_STRING'];
} else {
	$_searchquery = $_POST['name'];
}
if($_searchquery === "") {
	$_searchquery = "%";
}

$_searchquery = str_replace("*","%", $_searchquery);
$_searchquery = str_replace("%","", $_searchquery);

$sql = ' select * from Users WHERE(uid="'. $_searchquery . '" OR first LIKE "%' . $_searchquery . '%" OR last LIKE "%' . $_searchquery . '%" OR user LIKE "%' . $_searchquery . '%" OR email LIKE "%' . $_searchquery . '%");';
$result = $conn->query($sql);

if($result->num_rows > 0) {
	echo "<h2>Search Results:</h2>";
	echo "<hr>";
	echo "<h5 class='small-margin'>$result->num_rows results found</h5>";
	echo "<hr><br>";
	
	while($row = $result->fetch_assoc()) {
		if($row['disabled'] == 1) {
			#echo $row['user'] . " is disabled";
			continue;
		}

		if($result->num_rows == 1) {
			echo"
<form action='modify.php' method='post'>
	<fieldset>
		<legend>User: " . $row['user'] .  " (uid: ".$row['uid'].")</legend>
		<input type='hidden' name='uid' value='".$row['uid']."'
		<label class='inline'>Username: <input type='text' name='username' value='".$row['user']."'></label>
		<label class='inline'>First: <input type='text' name='firstname' value='".$row['first']."'></label>
		<label class='inline'>Last: <input type='text' name='lastname' value='".$row['last']."'></label>
		<label class='inline'>Email: <input type='text' name='emailaddr' value='".$row['email']."'></label>
		<input type='submit'>
	</fieldset>
</form>
			";
			echo '
	<form action="delete.php" method="post">
		<fieldset>
			<legend>Delete User</legend>
			<p><label>Username?  <input type="text" name="username"></label></p>
			<p><label>UserID?  <input type="text" name="userid"></label></p>
			<input type="submit">
		</fieldset>
	</form>
			';
		} else {
		## TODO: Make this into a table instead of just printing it out. ##	
		echo " - ";
		echo "<strong>" .  $row['user']  . "</strong>, ";
		echo $row['uid'] . ", ";
		echo $row['first'] . ", ";
		echo $row['last']  . ", ";
		echo $row['email'] . ", ";
		echo $row['disabled'] . ", ";
		echo "<a href='select.php?" . $row['uid'] ."'> | &#9;Modify User...</a>";
		echo "<br>";
	
		}

	}
} else {
	echo "No results for: " . $sql;
}
?>


	<p><a href="..">Go Back...</a></p>

</body>
</html>
