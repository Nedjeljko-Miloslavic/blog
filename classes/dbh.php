<?php

class Dbh {
	//ove  varijable treba konfigurirati po vlastitim postavkama
	private $host = "localhost";
	private $user = "root";
	private $pwd = "123qweasd";
	private $dbName = "blogs";
	
	//ova funkcija vraća PDO element
	private function connect(){
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
		$pdo = new PDO($dsn,$this->user, $this->pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;
	}
	
	public function getPosts(){
		$sql = "SELECT * FROM posts";
		$stmt = $this->connect()->query($sql);
		$arr = [];
		while($row = $stmt->fetch()){
			$arr[] = $row["subject"];
		}
		return $arr;
	}
	
	public function getPostsStmt($id){
		$sql = "SELECT * FROM posts WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$names = $stmt->fetchAll();
		foreach($names as $name){
			echo $name["subject"];
		}
	}
}