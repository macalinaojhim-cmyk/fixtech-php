<?php

session_start();
unset($_SESSION["isLoged"]);
unset($_SESSION["tickets"]);

header("Location: login.php");
exit;