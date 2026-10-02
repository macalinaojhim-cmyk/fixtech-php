<?php
session_start();
require("data.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST["priority"])) {
        array_push(
            $_SESSION["tickets"],
            [
                "name" => $_POST["name"],
                "device" => $_POST["device"],
                "problem" => trim($_POST["problem"] ?? "") ?: "I Don't Know",
                "priority" => $_POST["priority"],
                "status" => "pending"
            ]
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/createTicket.css">
    <link rel="stylesheet" href="style/general.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1 class="title">FixTech</h1>
    </header>
    <aside>
        <div class="logo">
            <h1>Welcome <?= $_SESSION["current-user"] ?></h1>
        </div>
        <div class="nav-btns">
            <nav>
                <a href="home.php">Dashboard</a>
                <a href="createTicket.php">Create Ticket</a>
                <a href="tickets.php">All Tickets</a>
            </nav>
        </div>
        <div class="logout-btn">
            <a href="login.php">Log Out</a>
        </div>
    </aside>
    <div class="content">
        <div>
            <div class="dash-header">
                <h2 class="page-header">Create Ticket</h2>
            </div>
            <div class="form-container">
                <form action="createTicket.php" method="post">
                    <label for="">
                        Name:
                        <input class="input-name" type="text" name="name" id>
                    </label>
                    <label for="">
                        Device
                        <select name="device">
                            <option value="laptop">Laptop</option>
                            <option value="desktop">Desktop</option>
                            <option value="internet">Internet</option>
                            <option value="mobile">Mobile</option>
                            <option value="printer">Printer</option>
                        </select>
                    </label>
                    <label for="">
                        Problem
                        <textarea name="problem" placeholder="Describe the issue">
                        </textarea>
                    </label>
                    <label for="priority">
                        <input type="radio" name="priority" value="low">Low
                        <input type="radio" name="priority" value="medium">Medium
                        <input type="radio" name="priority" value="high">High
                    </label>

                    <input type="submit" name="submit">

                </form>
            </div>
        </div>
    </div>
</body>

</html>