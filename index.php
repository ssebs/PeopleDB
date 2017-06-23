<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">

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
	<p class="text-center">Search, Create, Modify, and Delete Users.</p>
	<br>
	<p><strong>TODO:</strong> add ID's to output of Search. Also, add modify to custom searches with 1 result.</p>
	<hr>

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

	<form action="modify.php" method="post">
		<fieldset>
			<legend>Need to modify something?</legend>
			<p><label>User? <input type="text" name="user"></label></p>
	
			<p class="small-margin">Field to modify:</p>
			<label class="inline"><input type="radio" name="field" value="user">User</label>
			<label class="inline"><input type="radio" name="field" value="first">First</label>
			<label class="inline"><input type="radio" name="field" value="last">Last</label>
			<label class="inline"><input type="radio" name="field" value="email">Email</label>
			
			<p><label>Value? (what to change it to) <input type="text" name="value"></label></p>
			<input type="submit">
		</fieldset>
	</form>

	<form action="delete.php" method="post">
		<fieldset>
			<legend>Delete User</legend>
			<p><label>	Username? <input type="text" name="username"></label></p>
			<input type="submit">
		</fieldset>
	</form>
	

</body>
</html>
