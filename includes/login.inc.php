<?php

if(isset($_POST["submit"])){
	
	//grabbing the data
	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	
	
	//instantiation signupcontr class_alias
	
	include "../classes/dbh.classes.php";
	include "../classes/login.classes.php";
	include "../classes/login-contr.classes.php";
	
	$login = new LoginContr($uid,$pwd);
	
	//running error handlers and user signupcontr
	$login->loginUser();
	
	//going back to front page
	header("location: ../main.php?error=none");
}