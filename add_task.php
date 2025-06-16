<?php
include "db.php";
if (!isset($_SESSION["user_id"])) header("Location: login.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO recipe (title, ingredient, created_on, category, created_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $_POST["title"], $_POST["ingredient"], $_POST["created_on"], $_POST["category"], $_SESSION["user_id"]);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
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

    <body class="bg-secondary text-light">
        
       <h2 class=" m-3 text-danger d-inline-block d-flex justify-content-center bg-info">Add Task</h2>
       <div
        class="container text-center mt-5"
       >
     
       <form action="" method="POST">
       <table class=" table mx-auto text-center table-success">
        <tr>
            <td> <input type="text" name="title" placeholder="Title" required></td>
            <td><textarea name="ingredient" id="" placeholder="ingredients"></textarea></td>
            <td> <input type="date" name="created_on"></td>
            <td> <select name="category" id=""> Category
            <option value="veg">Veg</option>
            <option value="non_veg">Non Veg</option>
            <option value="drinks">Drinks</option>
            <option value="dessert">Dessert</option>
        </select></td>
        <td> <button class="btn btn-danger" type="submit">Add Task</button></td>
        </tr>
       </form>
       </div>
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
