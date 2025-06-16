<?php
include 'db.php';

if(!isset($_SESSION["user_id"])) header("Location: login.php");

$recipe_id= intval($_GET["id"]);
$stmt= $conn->prepare("delete from recipe where user_id=?");
$stmt->bind_param("i", $recipe_id);

if($stmt->execute()) header("Location: index.php")



?>