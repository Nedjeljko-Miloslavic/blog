<?php
include "../classes/dbh.classes.php";
include "../classes/comment.classes.php";

if(isset($_GET["user_id"]) && isset($_GET["post_id"]) && isset($_POST["comment"])){
	$user_id = $_GET["user_id"];
	$post_id = $_GET["post_id"];
	$comment_content = $_POST["comment"];
	if(strlen($_POST["comment"])>0){
		$comment = new Comment();
		$comment->setComment($user_id,$post_id,$comment_content);
	}
	
}

header("location: ../main.php");