<?php

class Dbh{
	private $host = "localhost";
	private $user = "root";
	private $pwd = "123qweasd";
	private $dbName = "blogs";
	
	
	protected function connect(){
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
		try{
			$pdo = new PDO($dsn,$this->user, $this->pwd);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			return $pdo;
		}catch(PDOException $e){
			print "ERROR!: " . $e->getMessage() . "<br>";
			die();
		}
	}
}