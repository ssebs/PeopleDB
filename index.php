<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
h1 {
	text-align: center;
}
.text-center {
	text-align: center;
}
.inline {
	display: inline;	
}
</style>

</head>
<body>
	<h1>People DB</h1>
	<p class="text-center">Search, Create, Modify, and Disable Users.</p>

	<form action="select.php" method="post">
		<fieldset>		
			<legend>Search User</legend>
			<p><label>Name? <input type="text" name="name"></label></p>
			<input type="submit">
		</fieldset>	
	</form>
	
	<form action="create.php" method="post">
		<fieldset>
			<legend>Create User</legend>
				
			<p><label>Username: <input type="text" name="username"> </label></p>
			<p><label>First name: <input type="text" name="firstname"> </label></p>
			<p><label>Last name: <input type="text" name="lastname"> </label></p>
			<p><label>Email: <input type="text" name="email"> </label></p>
			<p><input type="submit"></p>
		</fieldset>
	</form>

	<form action="delete.php" method="post">
		<fieldset>
			<legend>Delete User</legend>
			<p><label>	Username? <input type="text" name="username"></label></p>
			<p><label>	User ID? <input type="text" name="userid"></label></p>
			<input type="submit">
		</fieldset>
	</form>
	
	<form action="_UsersChangeLog_" method="post">
		<fieldset>
			<legend>PeopleDB Log</legend>
			<input type="submit" value="View Log">
		</fieldset>
	</form>
	

</body>
</html>
