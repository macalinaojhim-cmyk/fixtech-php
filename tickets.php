<?php
session_start();
require("data.php");
if ($_SESSION["isLoged"] === false) {
    header("Location: login.php");
    exit;
}



if (isset($_POST["delete_ticket"])) {
    $index = $_POST["ticket_index"];

    unset($_SESSION["tickets"][$index]);
    $_SESSION["tickets"] = array_values($_SESSION["tickets"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/tickets.css">
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
            <a href="reset.php">Log Out</a>
        </div>
    </aside>
    <div class="content">
        <div>
            <div class="dash-header">
                <h2 class="page-header">All Tickets</h2>
            </div>
            <div class="ticket-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Device</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION["tickets"] as $index => $ticket) { ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket["name"]) ?></td>
                                <td><?= htmlspecialchars($ticket["device"]) ?></td>
                                <td><?= htmlspecialchars($ticket["problem"]) ?></td>
                                <td><?= htmlspecialchars($ticket["priority"]) ?></td>
                                <td><?= htmlspecialchars($ticket["status"]) ?></td>

                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="ticket_id" value="<?= $ticket["id"] ?>">

                                        <button type="submit" name="delete_ticket" class="delete-btn">
                                            <i data-lucide="trash-2"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>