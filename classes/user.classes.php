<?php

class User extends Dbh{
	public function findUser($user_id){
		$stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id=?;");
		if(!$stmt->execute([$user_id])){
			return [];
		}
		if($stmt->rowCount()==0){
			return [];
		}else{
			return $stmt->fetchAll();
		}
	}
}