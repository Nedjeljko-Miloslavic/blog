

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog</title>
	<link rel="stylesheet" href="styles/index.css">
</head>
<body>
	<h1>Blog</h1>
	<div class="forms">
		<form action="includes/signup.inc.php" method="POST">
			<label>Sign up</label>
			<label for="username">Username</label>
			<input type="text" name="uid" placeholder="username">
			<label for="pwd">Password</label>
			<input type="password" name="pwd" placeholder="password">
			<label for="pwdrepeat">Password</label>
			<input type="password" name="pwdrepeat" placeholder="password">
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="email">
			<button type="submit" name="submit">Submit</button>
		</form>
		<form action="includes/login.inc.php" method="POST">
			<label>Login</label>
			<label for="username">Username</label>
			<input type="text" name="uid" placeholder="username or email">
			<label for="password">Password</label>
			<input type="password" name="pwd" placeholder="password">
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
</body>
</html>