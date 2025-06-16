<?php
include "config.php";
if ($_SESSION["role"] != "admin") header("Location: login.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO recipe (title, ingredient, created_on, category, created_by, assigned_to) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $_POST["title"], $_POST["ingredient"], $_POST["created_on"], $_POST["category"], $_SESSION["user_id"], $_POST["user_id"]);
    $stmt->execute();
    header("Location: admin.php");
}

$users = $conn->query("SELECT id, name FROM users WHERE role='user' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Add Recipe</h2>
    <form method="post" class="p-3 border rounded">
        <select name="user_id" class="form-select mb-2">
            <?php while ($user = $users->fetch_assoc()): ?>
                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
            <?php endwhile; ?>
        </select>
        <input type="text" name="title" class="form-control mb-2" placeholder="recipe Name" required>
        <textarea name="ingredient" class="form-control mb-2" placeholder="ingredient" required></textarea>
        <input type="date" name="created_on" class="form-control mb-2" required>
        <select name="category" class="form-select mb-2">
            <option value="veg">Veg</option>
            <option value="non_veg">Non Veg</option>
            <option value="drinks">Drinks</option>
            <option value="dessert">Dessert</option>

        </select>
        <button type="submit" class="btn btn-success">Add Recipe</button>
    </form>
</div>
</body>
</html>
