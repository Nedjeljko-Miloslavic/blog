<?php



class SignupContr extends Signup{
	private $uid;
	private $pwd;
	private $pwdRepeat;
	private $email;
	
	public function __construct($uid,$pwd,$pwdRepeat,$email){
		$this->uid = $uid;
		$this->pwd = $pwd;
		$this->pwdRepeat = $pwdRepeat;
		$this->email = $email;
	}
	
	public function signUpUser(){
		if($this->emptyInput()==false){
			header("location: ../index.php?error=emptyinput");
			exit();
		}
		if($this->invalidUid()==false){
			header("location: ../index.php?error=invaliduid");
			exit();
		}
		if($this->invalidEmail()==false){
			header("location: ../index.php?error=invalidemail");
			exit();
		}
		if($this->pwdMatch()==false){
			header("location: ../index.php?error=pwdnotmatch");
			exit();
		}
		if($this->uidTakenCheck()==true){
			header("location: ../index.php?error=uidtaken");
			exit();
		}
		$this->setUser($this->uid,$this->pwd,$this->email);
		
	}
	
	public function emptyInput(){
		$result;
		if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
	public function invalidUid(){
		$result;
		if(!preg_match("/^[a-žA-Ž0-9]*$/", $this->uid)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
	public function invalidEmail(){
		$result;
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
	public function pwdMatch(){
		$result;
		if($this->pwd !== $this->pwdRepeat){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
	public function uidTakenCheck(){
		$result;
		if($this->checkUser($this->uid, $this->email)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
	
	
	
}