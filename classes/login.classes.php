<?php

class Login extends Dbh{
	
	//provjerava se poklapanje passworda i emaila/username-a te ako su podaci ispravni ulogira se user te se postavlja SESSION
	protected function getUser($uid,$pwd){
		$stmt = $this->connect()->prepare("SELECT password FROM users WHERE username = ? OR email = ?;");
	
		if(!$stmt->execute([$uid,$uid])){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount()==0){
			$stmt = null;
			header("location: ../index.php?error=usernotfound");
			exit();
		}
		
		$pwdHashed = $stmt->fetchAll();
		$checkPwd = password_verify($pwd, $pwdHashed[0]["password"]);
				
		
		if($checkPwd==false){
			$stmt = null;
			header("location: ../index.php?error=usernotfound");
			exit();
		}elseif($checkPwd==true){
			$stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;");
			if(!$stmt->execute([$uid,$uid,$pwd])){
				$stmt = null;
				header("location: ../index.php?error=stmtfailed");
				exit();
			}
			
			if($stmt->rowCount()==0){
				$stmt = null;
				header("location: ../index.php?error=usernotfound");
				exit();
			}
			$user = $stmt->fetchAll();
			session_start();
			$_SESSION["user_id"] = $user[0]["user_id"];
			$_SESSION["username"] = $user[0]["username"];
			$_SESSION["user"] = $user[0];
		}
		
		
		$stmt = null;
		
	}
	
	
}