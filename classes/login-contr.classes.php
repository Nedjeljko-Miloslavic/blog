<?php

class LoginContr extends Login{
	private $uid;
	private $pwd;
	
	public function __construct($uid,$pwd){
		$this->uid = $uid;
		$this->pwd = $pwd;
	}
	
	//ako su oba inputa unesena ova funkcija će pokušati ulogirati usera
	//$this->getUser je uvezena funkcija iz Login classa
	public function loginUser(){
		if($this->emptyInput()==false){
			header("location: ../index.php?error=emptyinput");
			exit();
		}
		$this->getUser($this->uid,$this->pwd);
	}
	
	public function emptyInput(){
		$result;
		if(empty($this->uid) || empty($this->pwd)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
}