<?php

include "classes/dbh.classes.php";
include "classes/blogsdisplay.classes.php";
include "classes/like.classes.php";
include "classes/favorite.classes.php";
include "classes/comment.classes.php";
include "classes/user.classes.php";


$blog = new BlogsDisplay();
$comment = new Comment();

//svi postovi
$allBlogs = $blog->findBlogs();


foreach($allBlogs as $blog){
	//svi komentari na post
	$comments = $comment->findComment($blog["post_id"]);
	
	echo "<div class='post'>";
		//ako je user admin ili je user autor posta prikazat će mu se tipa 'delete' za uklanjanje posta
		if(isset($_SESSION["user"])){
			if($_SESSION["user"]["user_id"]==$blog["user_id"] || $_SESSION["user"]["username"]=="admin"){
				echo "<div class='del'>";
					echo "<a href='includes/deletepost.inc.php?post_id=".$blog["post_id"]."'>delete</a>";
				echo "</div>";
			}
			
		}
		echo "<h2>".$blog["title"]."</h2>";
		echo "<div class='content'>".$blog["content"]."</div>";
		if(isset($_SESSION["user"])){
			$like = new Like();
			$favorite = new Favorite();
			//provjera jeli post user već lajkao
			$alreadyLiked;
			if(!$like->findLike($_SESSION["user_id"],$blog["post_id"])){
				$alreadyLiked = true;
			}else{
				$alreadyLiked = false;
			}
			
			//provjera jeli post user već fejvoritao
			$alreadyFavorited;
			if(!$favorite->findFavorite($_SESSION["user_id"],$blog["post_id"])){
				$alreadyFavorited = true;
			}else{
				$alreadyFavorited = false;
			}
			
			if($blog["user_id"]==$_SESSION["user"]["user_id"]){
				echo "<div>Posted by: You</div>";
			}else{
				echo "<div>Posted by: ".$blog["username"]."</div>";
			}
			echo "<div class='interactions'>";
				//ovisno o tome jeli user lajkao post on će biti prikazan u različitoj boji i lajkanje će biti omogućeno/onemogućeno
				if(!$alreadyLiked){
					echo "<a href='includes/like.inc.php?user_id=".$_SESSION["user"]["user_id"]."&post_id=".$blog["post_id"]."'>Like</a>";
				}else{
					echo "<a class='liked'>Like</a>";
				}
				
				echo "<span>".$blog["likes"]."</span>";
				//ovisno o tome jeli user fejvoritao post on će biti prikazan u različitoj boji i fejvoritanje će biti omogućeno/onemogućeno
				if(!$alreadyFavorited){
					echo "<a href='includes/favorite.inc.php?user_id=".$_SESSION["user"]["user_id"]."&post_id=".$blog["post_id"]."'>Favorite</a>";
				}else{
					echo "<a class='liked' href='includes/favorite.inc.php?user_id=".$_SESSION["user"]["user_id"]."&post_id=".$blog["post_id"]."'>Favorite</a>";
				}
				
				//forma za dodavanje komentara - referira se na file 'includes/comment.inc.php'
				echo "<form method='POST' action='includes/comment.inc.php?user_id=".$_SESSION["user"]["user_id"]."&post_id=".$blog["post_id"]."'>";
					echo "<input type='text' placeholder='add comment...' name='comment'>";
					echo "<button type='submit'>Post comment</button>";
				echo "</form>";
			echo "</div>";
		}else{
			echo "<div>Posted by: ".$blog["username"]."</div>";
		}
		echo "<div class='comments'>";
			if(count($comments)){
				echo "<h2>Comments</h2>";
			}
			
			foreach($comments as $singleComment){
				$userClass = new User();
				//pronalazi autora komentara prema 'user_id-u' 
				$user = $userClass->findUser($singleComment["user_id"]);
				echo "<div class='comment'>";
					echo "<div>";
						echo "<div class='comment_user'>";
							echo $user[0]["username"];
						echo "</div>";
						echo "<div class='comment_content'>";
							echo $singleComment["comment_content"];
						echo "</div>";
					echo "</div>";
					if(isset($_SESSION["user_id"])){
						//ako je user autor ovog komentara ili je admin može ga obrisati
						if($user[0]["user_id"]==$_SESSION["user_id"] || $_SESSION["user"]["username"]=="admin"){
							echo "<div class='delete'>";
								echo "<a href='includes/deletecomment.inc.php?comment_id=".$singleComment["comment_id"]."'>delete</a>";
							echo "</div>";
						}
					}
				echo "</div>";
			}	
		echo "</div>";
	echo "</div>";
}
