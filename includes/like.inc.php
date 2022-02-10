<?php

include "../classes/dbh.classes.php";
$dbh = new Dbh();
class Like extends Dbh{
	public function get(){
		var_dump($this->connect());
	}
	
}
$like = new Like();
$like->get();