<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="site.css">
<style>
.center {
	margin: auto;
	width: 50%;
}
.text-center {
	text-align: center;
}
.big {
	font-weight: bold;
	font-size: 1.3em;
	text-decoration: underline
}
</style>
</head>

<body>
	<h1 class="center">People DB</h1>
	<hr>

	<div class="center">
		<form action="select.php" method="post">
			<p class="text-center big">Search User</p>
			Name? <input type="text" name="name">
			<input type="submit" class="center" style="display: block;" >
		</form>
	</div>
	
	<hr>
	
	<div class="center">
		<p class="text-center big">Create User</p>
		<form action="create.php" method="post">
			Username: <input type="text" name="username"> 
			<br>
			First name: <input type="text" name="firstname">
			<br>
			Last name: <input type="text" name="lastname">
			<br>
			Email: &nbsp; &nbsp; &nbsp; <input type="text" name="email">
			<br>
			<input type="submit" class="center" style="display: block;" >
			
		</form>
	</div>

	<hr>

	<div class="center">
		<form action="delete.php" method="post">
			<p class="text-center big">Delete User</p>
			Username? <input type="text" name="username">
			<input type="submit" class="center" style="display: block;" >
		</form>
	</div>

</body>
</html>
