<?php



class Signup extends Dbh{
	protected function checkUser($uid,$email){
		$stmt = $this->connect()->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?;");
		if(!$stmt->execute([$uid,$email])){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		$resultCheck;
		if($stmt->rowCount()>0){
			$resultCheck = false;
		}else{
			$resultCheck = true;
		}
		return $resultCheck;
	}
	
	protected function setUser($uid,$pwd,$email){
		$stmt = $this->connect()->prepare("INSERT INTO users (username,password,email) VALUES (?,?,?);");
		$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
		if(!$stmt->execute([$uid,$hashedPwd,$email])){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		$stmt = null;
	}
}