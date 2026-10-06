<?php
if (!isset($_SESSION["isLoged"])) {
    $_SESSION["isLoged"] = false;
}
if (!isset($_SESSION["current-user"])) {
    $_SESSION["current-user"] = "";
}

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "usersdb";
$conn = "";
try {
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
} catch (mysqli_sql_exception) {
    echo "Can't Connect";
}

$getTickets = "SELECT * FROM tickets";
$result = mysqli_query($conn, $getTickets);

if (!isset($_SESSION["tickets"])) {
    $_SESSION["tickets"] = [];

    if (mysqli_num_rows($result) > 0) {
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($tickets as $ticket) {
            $_SESSION["tickets"][] = $ticket;
        }
    }
}
