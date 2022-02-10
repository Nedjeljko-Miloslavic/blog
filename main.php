<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog</title>
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<header>
		<div class="blog">BLOG</div>
		<div class="username"><?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["username"];} ?></div>
		<div class="login">
		<?php if(!isset($_SESSION["user"])){ ?>
			<a href="index.php">Login/Signup</a>
		<?php }else{ ?>
			<a href="includes/logout.inc.php">Logout</a>
		<?php } ?>
		</div>
	</header>
	<div class="main">
		<div class="postContainer">
			<h1>All posts</h1>
			<?php include "includes/blogsdisplay.inc.php"; ?>
		</div>
		<?php if(isset($_SESSION["user"])){ ?>
			<div class="newPost">
				<h2>Create new post</h2>
				<form action="includes/newpost.inc.php" method="POST">
					<label for="title">Title</label>
					<input type="text" name="title">
					<label for="content">Content</label>
					<textarea name="content"></textarea>
					<button type="submit" name="submit">Post</button>
				</form>
			</div>
		<?php } ?>
	</div>
	<script src="main.js"></script>
</body>
</html>