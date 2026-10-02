<?php
    
    if(!isset($_SESSION["users"])){
        $_SESSION["users"] = [
        ["username" => "balmond", "password" => "nana143"],
    ];
    }

    if (!isset($_SESSION["current-user"])) {
    $_SESSION["current-user"] = "";
}
    if(!isset($_SESSION["tickets"])){
        $_SESSION["tickets"] = [
            ["name" => "franco", 
            "device" => "laptop", 
            "problem" => "battery exploded", 
            "priority" => "high", 
            "status" => "completed"],
            
            ["name" => "Grock", 
            "device" => "Mobile", 
            "problem" => "battery exploded", 
            "priority" => "high", 
            "status" => "completed"]
        ];
    }
