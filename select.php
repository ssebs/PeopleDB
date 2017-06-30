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

$sql = ' select * from Users WHERE(id="'. $_searchquery . '" OR first LIKE "%' . $_searchquery . '%" OR last LIKE "%' . $_searchquery . '%" OR user LIKE "%' . $_searchquery . '%" OR email LIKE "%' . $_searchquery . '%");';
$result = $conn->query($sql);

if($result->num_rows > 0) {
	echo "<h2>Search Results:</h2>";
	echo "<hr>";
	echo "<h5 class='small-margin'>$result->num_rows results found</h5>";
	echo "<hr><br>";
	
	while($row = $result->fetch_assoc()) {


		if($result->num_rows == 1) {
			echo"
<form action='modify.php' method='post'>
	<fieldset>
		<legend>User: " . $row['user'] .  " (id: ".$row['id'].")</legend>
		<input type='hidden' name='id' value='".$row['id']."'
		<label class='inline'>Username: <input type='text' name='username' value='".$row['user']."'></label>
		<label class='inline'>First: <input type='text' name='firstname' value='".$row['first']."'></label>
		<label class='inline'>Last: <input type='text' name='lastname' value='".$row['last']."'></label>
		<label class='inline'>Email: <input type='text' name='emailaddr' value='".$row['email']."'></label>
		<input type='submit'>
	</fieldset>
</form>
			";
		} else {
		## TODO: Make this into a table instead of just printing it out. ##	
		echo " - ";
		echo $row['user']  . ", ";
		echo $row['first'] . ", ";
		echo $row['last']  . ", ";
		echo $row['email'] . ", ";
		echo "<a href='select.php?" . $row['id'] ."'> | &#9;Modify User...</a>";
		echo "<hr>";
	
		}

	}
} else {
	echo "No results for: " . $sql;
}
?>


	<p><a href="..">Go Back...</a></p>

</body>
</html>
