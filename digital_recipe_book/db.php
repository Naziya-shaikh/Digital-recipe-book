<?php
session_start();
$servername="localhost";
$username="root";
$password="msql";
$db_name="recipe_book";

$conn = new mysqli($servername, $username,$password,$db_name);
if(!$conn){
    echo "error connecting database";
}




?>