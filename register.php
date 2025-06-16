<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role= $_POST["role"];

    $stmt = $conn->prepare("insert into users(name, email, password, role) values(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$password, $role);
    $stmt->execute();
  

    $successMessage = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $successMessage = "Registration successful!";
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
    <h2 class="text-center m-3">User Registration</h2>

        <div class="container m-5 p-3 text-center">
            <form action="register.php" method="POST">
                <div class="mb-3 row">
                    <label
                        for="inputName"
                        class="col-4 col-form-label"
                        >Name</label
                    >
                    <div
                        class="col-8"
                    >
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder=" Enter Name" required
                        />
                    </div>
                </div>
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
                            placeholder=" Enter Email Id" required
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
                            placeholder=" Enter password" required
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="role" class="col-4 col-form-label">Role</label>
                    <div class="col-8">
                        <select class="form-select" name="role" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
               
                
                
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                          
                            submit
                        </button>
                        <p class="mt-2 text-center">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
                <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
                    <div class="alert text-center fs-3 mt-3" role="alert">
                        <?php echo $successMessage. '<a href="login.php">login</a>'; ?>
                    </div>
                <?php endif; ?>
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
