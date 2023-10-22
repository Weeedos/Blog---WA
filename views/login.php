<?php

error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /home");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $host = 'localhost';
    $dbname = 'blog_db';
    $username_db = 'root';
    $password_db = '';

    if (isset($_POST["login"])) {
        try {
            if (isset($_POST["login"])) {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['authenticated'] = true;
                    $successMessage = "You are logged in";
                } else {
                    $errorMessage = "Invalid username or password";
                }
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } elseif (isset($_POST["register"])) {
        try {
            if ($_SESSION["username"] === "" || $_SESSION["username"] === " " || $_SESSION["password"] === "" || $_SESSION["password"] === " ") {
                $errorMessage = "Registration failed";
            } else {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                $successMessage = "Registration successful";
            }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>E-Shop</title>
    <style>
        #heading,
        #subheading,
        #content {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/home">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/index.php" ? "active" : "" ?>"
                            href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/index.php" ? "active" : "" ?>"
                            href="/blog">Blog</a>
                    </li>
                    <?php if (isset($_SESSION["authenticated"])) { ?>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="/logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/login.php" ? "active" : "" ?>"
                                href="/login">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
            <button type="submit" class="btn btn-secondary" name="register" value="register">Register</button>
        </form>
    </div>

    <footer class="mt-4 text-center">
        <p>&copy; 2023 Vít Vosol. All rights reserved.</p>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
