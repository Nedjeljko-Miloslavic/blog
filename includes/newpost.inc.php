<?php
session_start();
if(isset($_POST["submit"])){
	$title = $_POST["title"];
	$content = $_POST["content"];
	
	include "../classes/dbh.classes.php";
	include "../classes/newpost.classes.php";
	include "../classes/newpost-contr.classes.php";
	
	$newpost = new NewpostContr($title,$content);
	$newpost->createNewPost();
	header("location: ../main.php?error=none");
}