<?php

class BlogsDisplay extends Dbh{
	public function findBlogs(){
		$stmt = $this->connect()->prepare("SELECT * FROM posts;");
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