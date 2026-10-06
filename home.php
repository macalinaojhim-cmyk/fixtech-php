<?php
session_start();

require("data.php");
if ($_SESSION["isLoged"] === false){
    header("Location: login.php");
    exit;
}
$pendings = 0;
$completed = 0;

foreach ($_SESSION["tickets"] as $ticket) {
    if ($ticket["status"] === "pending") {
        $pendings++;
    }

    if ($ticket["status"] === "completed") {
        $completed++;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/home.css">
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
                <a href="">Dashboard</a>
                <a href="createTicket.php">Create Ticket</a>
                <a href="tickets.php">All Tickets</a>
            </nav>
        </div>
        <div class="logout-btn">
            <a href="reset.php">Log Out</a>
        </div>
    </aside>
    <div class="content">
        <div>
            <div class="dash-header">
                <h2 class="page-header">Dashboard</h2>
            </div>
            <div class="card-container">
                <div class="card total-tickets">
                    <h3>Total Tickets</h3>
                    <p><?= count($_SESSION["tickets"]) ?></p>
                </div>
                <div class="card pending">
                    <h3>Pending</h3>
                    <p><?=  $pendings?></p>
                </div>
                <div class="card completed">
                    <h3>Competled</h3>
                    <p><?= $completed ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>