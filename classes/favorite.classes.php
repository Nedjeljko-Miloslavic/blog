<?php

class Favorite extends Dbh{
	public function setFavorite($user_id,$post_id){
		//ovdje provjeravamo jeli user već fejvoritao post
		$result = $this->findFavorite($user_id,$post_id);
		
		
		if($result){
			//ako nije lajkao dodajemo novi lajk u likes
			$stmt = $this->connect()->prepare("INSERT INTO favorite (user_id,post_id) VALUES (?,?)");
			$stmt->execute([$user_id,$post_id]);
			$stmt = null;
		}else{
			$stmt = $this->connect()->prepare("DELETE FROM favorite WHERE user_id=? AND post_id=?;");
			$stmt->execute([$user_id,$post_id]);
			$stmt = null;
		}
		
		
		
	}
	
	//ovaj method nam služi za provjeru jeli user već fejvoritao post
	public function findFavorite($user_id,$post_id){
		
		$stmt = $this->connect()->prepare("SELECT * FROM favorite WHERE user_id=? AND post_id=?");
		if(!$stmt->execute([$user_id,$post_id])){
			$stmt = null;
			return false;
			exit();
		}
		
		if($stmt->rowCount()==0){
			return true;
			exit();
		}else{
			return false;
		}
		
	}
}