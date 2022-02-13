<?php

if(isset($_POST["submit"])){
	
	//grabbing the data
	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
	$email = $_POST["email"];
	
	
	//uvozimo classove
	
	include "../classes/dbh.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";
	
	$signup = new SignupContr($uid,$pwd,$pwdrepeat,$email);
	
	//ovdje se provjeravaju greške. Ako je sve u redu provodi se signup novog usera
	$signup->signUpUser();
	
	//vraćamo se na index.php
	header("location: ../index.php?error=none");
}