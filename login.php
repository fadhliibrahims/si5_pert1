<?php
    session_start();
    if(isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }
    require 'functions.php';
    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if( $password === $row["password"] ) {
                $_SESSION["login"] = true;
                header("Location: admin.php");
                exit;
            }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="main">
        <h1>Login Form</h1>
        <?php if(isset($error)) : ?>
            <p>Username / Password Salah</p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password : </label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn" name="login">Login</button>
        </form>
    </div>
</body>
</html>