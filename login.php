
<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($_POST["password"], $result["password"])) {
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["role"] = $result["role"];
        header("Location: " . ($result["role"] == "admin" ? "admin.php" : "index.php"));
    } else {
        $error = "Invalid login credentials.";
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

    
    <body class="bg-secondary">
        <h2 class="text-center text-black m-3 p-2">Login</h2>
        <?php if (isset($error)) echo "<p class='text-dark fs-3'>$error</p>"; ?>
        <div class="container m-5 p-3 text-center">
            <form method="POST">
                <div class="mb-3 row">
                    <label
                        for="inputName"
                        class="col-4 col-form-label"
                        >Email Id</label
                    >
                    <div
                        class="col-8"
                    >
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder=" email Id" required
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label
                        for="inputName"
                        class="col-4 col-form-label"
                        >Password</label
                    >
                    <div
                        class="col-8"
                    >
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder=" password" required
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            login
                        </button>
</div>
</div>
</form>
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
