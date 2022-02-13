<?php

class NewpostContr extends Newpost{
	private $title;
	private $content;
	private $user_id;
	private $username;
	
	
	public function __construct($title,$content){
		$this->title = $title;
		$this->content = $content;
		$this->user_id = $_SESSION["user"]["user_id"];
		$this->username = $_SESSION["user"]["username"];
	}
	
	//ova funkcija kreira post
	//$this->setNewPost je funkcija uvezena iz Newpost class-a
	public function createNewPost(){
		if($this->emptyInput()==false){
			header("location: ../main.php?error=emptyinput");
			exit();
		}
		$this->setNewPost($this->user_id,$this->title,$this->content,$this->username);
	}
	
	//ova funkcija samo provjerava jeli input postoji
	private function emptyInput(){
		$result;
		if(empty($this->title) || empty($this->content) || empty($this->user_id)){
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}
}