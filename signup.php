<?php
session_start();
require("data.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $error = "Invalid Credentials";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters";
    } elseif ($password !== $confirmPassword) {
        $error = "Password didn't matched";
    }elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)){
        $error = "weak password, must contain special chars";
    } else {
        array_push($_SESSION["users"], [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-form">
        <div class="content">
            <h2>Sign Up</h2>
            <form action="signup.php" method="post">
                <label for="">
                    Username:
                    <input type="text" name="username">
                </label>
                <label for="">
                    Password:
                    <input type="password" name="password">
                </label>
                 <label for="">
                    Confirm Password:
                    <input type="password" name="confirm-password">
                </label>
                <div>
                    <button type="submit" name="signup" value="signup">Submit</button>
                    <a href="login.php">Log in</a>
                </div>
            </form>
            <p class="error"><?= $error ?? "" ?></p>
        </div>
    </div>
</body>

</html>