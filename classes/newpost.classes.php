<?php

class Newpost extends Dbh{
	//kreiranje novog posta
	protected function setNewPost($user_id,$title,$content,$username){
		$timestamp = date_timestamp_get(date_create());
		$stmt = $this->connect()->prepare("INSERT INTO posts (user_id,title,content,timestamp,username,likes) VALUES (?,?,?,?,?,0);");
		if(!$stmt->execute([$user_id,$title,$content,$timestamp,$username])){
			$stmt = null;
			header("location: ../main.php?error=postfailed");
			exit();
		}
		$stmt = null;
	}
}