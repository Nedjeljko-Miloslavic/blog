<?php

include "../classes/dbh.classes.php";
include "../classes/like.classes.php";
$like = new Like();
$state = $like->setLike($_GET["user_id"],$_GET["post_id"]);
header("location: ../main.php");