<?php
include "db.php";
if (!isset($_SESSION["user_id"])) header("Location: login.php");

$recipe_id = intval($_GET["recipe_id"]);
$stmt = $conn->prepare("SELECT * FROM recipe WHERE user_id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$task = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE recipe SET title=?, ingredient=?, created_on=?, category=? WHERE user_id=?");
    $stmt->bind_param("ssssi", $_POST["title"], $_POST["ingredient"], $_POST["created_on"], $_POST["category"], $recipe_id);
    if ($stmt->execute()) header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Recipe</h2>
    <form method="post" class="p-3 border rounded">
        <input type="text" name="title" class="form-control mb-2" value="<?= $task['title'] ?>" required>
        <textarea name="ingredient" class="form-control mb-2"><?= $task['ingredient'] ?></textarea>
        <input type="date" name="created_on" class="form-control mb-2" value="<?= $task['created_on'] ?>" required>
        <select name="category" class="form-select mb-2">
            <option value="veg" <?= $task['category'] == 'veg' ? 'selected' : '' ?>>Veg</option>
            <option value="non_veg" <?= $task['category'] == 'non_veg' ? 'selected' : '' ?>>Non Veg</option>
            <option value="drinks" <?= $task['category'] == 'drinks' ? 'selected' : '' ?>>Drinks</option>
            <option value="dessert" <?= $task['category'] == 'dessert' ? 'selected' : '' ?>>Dessert</option>

        </select>
        <button type="submit" class="btn btn-success">Update Recipe</button>
    </form>
</div>
</body>
</html>
