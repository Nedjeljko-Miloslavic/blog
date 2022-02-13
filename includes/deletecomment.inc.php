<?php

include "../classes/dbh.classes.php";
include "../classes/comment.classes.php";

if(isset($_GET["comment_id"])){
	$comment_id = $_GET["comment_id"];
	$comment = new Comment();
	$comment->deleteComment($comment_id);
}
header("location: ../main.php");

