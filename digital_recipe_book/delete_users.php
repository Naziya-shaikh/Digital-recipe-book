<?php
include 'db.php';

if($_SESSION["role"] != "admin") header("Location: login.php");

$user_id = intval($_GET["id"]);
$conn->query("delete from users where id=$user_id");
header("Location: manage_users.php");


?>
