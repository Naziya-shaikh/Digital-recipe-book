<?php
include "db.php";
if (!isset($_SESSION["user_id"])) header("Location: login.php");

$user_id = $_SESSION["user_id"];
$role = $_SESSION["role"];
$tasks = $conn->query($role == "admin" ? "SELECT * FROM recipe " : "SELECT * FROM recipe WHERE created_by = $user_id");
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

    <body class="bg-success">
    <div class="container mt-5">
    <h2 class="text-center text-warning">User Management System</h2>
    <a href="logout.php" class="btn btn-danger  float-end">Logout</a>
    <a href="add_task.php" class="btn btn-primary mb-3">➕ Add Task</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Ingredient</th>
                <th>Created On</th>
                <th>category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($task = $tasks->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($task["title"]) ?></td>
                <td><?= htmlspecialchars($task["ingredient"]) ?></td>
                <td><?= $task["created_on"] ?></td>
                <td><?= ucfirst($task["category"]) ?></td>
                <td>
                    <a href="edit_recipe.php?recipe_id=<?= $task['user_id'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                    <a href="delete_recipe.php?user_id=<?= $task['user_id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this task?')">🗑 Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
        </tr>
       </table>
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
