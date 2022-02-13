<?php

class BlogsDisplay extends Dbh{
	//funkcija koja vraća sve postove
	public function findBlogs(){
		$stmt = $this->connect()->prepare("SELECT * FROM posts ORDER BY timestamp;");
		if(!$stmt->execute()){
			$stmt = null;
			return [];
			exit();
		}
		if($stmt->rowCount()==0){
			$stmt = null;
			return [];
			exit();
		}
		$blogs = $stmt->fetchAll();
		return $blogs;
	}
	
}