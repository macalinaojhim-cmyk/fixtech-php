<?php

session_start();

unset($_SESSION["tickets"]);

header("Location: login.php");
exit;