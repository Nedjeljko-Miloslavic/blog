<?php

include "../classes/dbh.classes.php";
include "../classes/deletepost.classes.php";

if(isset($_GET["post_id"])){
	$deletePost = new DeletePost();
	$deletePost->deleteP($_GET["post_id"]);
	var_dump($_GET["post_id"]);
}
header("location: ../main.php");