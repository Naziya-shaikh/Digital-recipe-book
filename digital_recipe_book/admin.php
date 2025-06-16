<?php

include 'db.php';
if($_SESSION["role"] != "admin") header("Location: login.php");

$taskCount = $conn->query("select count(*) as count from recipe")->fetch_assoc()['count'];
$userCount = $conn->query("select count(*) as count from users")->fetch_assoc()['count'];
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="bg-black">
       
    <div class="container mt-5">
    <h2 class="text-center text-light">Admin Dashboard</h2>
    <p class="text-center text-white">Total Users: <?= $userCount ?> | Total Tasks: <?= $taskCount ?></p>
    <div class="d-flex justify-content-center">
        <a href="manage_users.php" class="btn btn-danger me-2">Manage Users</a>
        <a href="add_recipe.php" class="btn btn-success me-2">add recipe</a>
        <a href="index.php" class="btn btn-secondary me-2">View Tasks</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


