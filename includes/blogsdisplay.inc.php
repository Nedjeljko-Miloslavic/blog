<?php

include "classes/dbh.classes.php";
include "classes/blogsdisplay.classes.php";


$blog = new BlogsDisplay();
//var_dump($blog->findBlogs());


$allBlogs = $blog->findBlogs();

foreach($allBlogs as $blog){
	echo "<div class='post'>";
	echo "<h2>".$blog["title"]."</h2>";
	echo "<div class='content'>".$blog["content"]."</div>";
	if(isset($_SESSION["user"])){
		if($blog["user_id"]==$_SESSION["user"]["user_id"]){
			echo "<div>Posted by: You</div>";
		}else{
			echo "<div>Posted by: ".$blog["username"]."</div>";
		}
		echo "<div class='interactions'>";
			echo "<a href='includes/like.inc.php'>Like</a>";
			echo "<span>".$blog["likes"]."</span>";
			echo "<a href='includes/like.inc.php'>Favorite</a>";
		echo "</div>";
	}else{
		echo "<div>Posted by: ".$blog["username"]."</div>";
	}
	
	echo "</div>";
}
/*
*/