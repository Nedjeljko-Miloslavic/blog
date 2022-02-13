<?php

class Like extends Dbh{
	public function setLike($user_id,$post_id){
		//ovdje provjeravamo jeli user već lajkao post
		$result = $this->findLike($user_id,$post_id);
		if($result){
			//ako nije lajkao dodajemo novi lajk u likes
			$stmt = $this->connect()->prepare("INSERT INTO likes (user_id,post_id) VALUES (?,?)");
			$stmt->execute([$user_id,$post_id]);
			$stmt = null;
			
			//povećavamo broj lajkova na samom postu za jedan
			$stmt = $this->connect()->prepare("SELECT likes FROM posts WHERE post_id=?");
			$stmt->execute([$post_id]);
			$likes = $stmt->fetch();
			$numberOflikes = $likes["likes"]*1;
			$numberOflikes++;
			$stmt = null;
			$stmt = $this->connect()->prepare("UPDATE posts SET likes=? WHERE post_id=?");
			$stmt->execute([$numberOflikes,$post_id]);
			
		}else{
			$stmt = null;
			exit();
		}
		
		
	}
	
	//ovaj method nam služi za provjeru jeli user već lajkao post
	public function findLike($user_id,$post_id){
		
		$stmt = $this->connect()->prepare("SELECT * FROM likes WHERE user_id=? AND post_id=?");
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