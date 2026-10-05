<?php
session_start();
require("data.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $error = "Invalid Credentials";
    } else {

        foreach ($_SESSION["users"] as $user) {
            if ($_POST["username"] === $user["username"] && password_verify($_POST["password"],$user["password"] )) {
                $_SESSION["current-user"] = $_POST["username"];
                header("Location: home.php");
                exit;
            } else {
                $error = "Invalid Credentials";
            }
        }

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
            <h2>Log In</h2>
            <form action="login.php" method="post">
                <label for="">
                    Username:
                    <input type="text" name="username">
                </label>
                <label for="">
                    Password:
                    <input type="password" name="password">
                </label>
                <div>
                    <button type="submit" name="login" value="login">Log In</button>
                    <a href="signup.php">Sign In</a>
                </div>
            </form>
            <p class="error"><?= $error ?? "" ?></p>
        </div>
    </div>
</body>

</html>