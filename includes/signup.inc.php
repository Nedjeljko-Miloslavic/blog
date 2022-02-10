<?php

if(isset($_POST["submit"])){
	
	//grabbing the data
	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
	$email = $_POST["email"];
	
	
	//instantiation signupcontr class_alias
	
	include "../classes/dbh.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";
	
	$signup = new SignupContr($uid,$pwd,$pwdrepeat,$email);
	
	//running error handlers and user signupcontr
	$signup->signUpUser();
	
	//going back to front page
	header("location: ../index.php?error=none");
}