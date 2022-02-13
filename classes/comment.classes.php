<?php

class Comment extends Dbh{
	public function setComment($user_id,$post_id,$comment_content){
		$stmt = $this->connect()->prepare("INSERT INTO comments (user_id,post_id,comment_content) VALUES (?,?,?)");
		if(!$stmt->execute([$user_id,$post_id,$comment_content])){
			return false;
		}
		
	}
	
	public function findComment($post_id){
		$stmt = $this->connect()->prepare("SELECT * FROM comments WHERE post_id=?");
		if(!$stmt->execute([$post_id])){
			$stmt=null;
			return [];
		}
		if($stmt->rowCount()==0){
			return [];
		}
		$comments = $stmt->fetchAll();
		return $comments;
	}
	
	public function deleteComment($comment_id){
		$stmt = $this->connect()->prepare("DELETE FROM comments WHERE comment_id=?;");
		$stmt->execute([$comment_id]);
	}
}