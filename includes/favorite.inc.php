<?php

include "../classes/dbh.classes.php";
include "../classes/favorite.classes.php";
$favorite = new Favorite();
$state = $favorite->setFavorite($_GET["user_id"],$_GET["post_id"]);
var_dump($state);
header("location: ../main.php");