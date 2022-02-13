<?php

class DeletePost extends Dbh{
	public function deleteP($post_id){
		$stmt = $this->connect()->prepare("DELETE FROM posts WHERE post_id=?;");
		$stmt->execute([$post_id]);
	}
}