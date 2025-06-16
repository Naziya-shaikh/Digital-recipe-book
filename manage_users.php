<?php
include "db.php";
if ($_SESSION["role"] != "admin") header("Location: login.php");

$result = $conn->query("SELECT id, name, email, role FROM users");

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

    <body>
       <div
        class="container m-5"
       >
        <table class="table table-bordered table-striped table-secondary">
            <tr>
                <th>Name</th>
                <th>Email Id</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php while($user = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $user["name"] ?></td>
                <td><?=$user["email"] ?></td>
                <td><?=$user["role"] ?></td>
                <td>
                    <a
                        name=""
                        id=""
                        class="btn btn-danger"
                        href="delete_users.php?id=<?= $user['id']?>"
                         onclick="return confirm('Are you sure you want to delete this user?')"
                        role="button"
                        >Delete</a
                    >
                    
                </td>
            </tr>
            <?php  endwhile; ?>
        </table>
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

