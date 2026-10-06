<?php
session_start();
require("data.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $error = "Invalid Credentials";
    } else {
        $reqUser = $_POST["username"];
        $req = "SELECT * FROM users WHERE username = '$reqUser'";
        $result = mysqli_query($conn, $req);
        
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            if($verifyPass = password_verify($_POST["password"], $user["password"])){
                $_SESSION["isLoged"] = true;
                header("Location: home.php");
                exit;
            }else {
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