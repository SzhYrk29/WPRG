<?php

$ip = 'IP.txt';
$clientIp = $_SERVER['REMOTE_ADDR'];
$isAllowed = false;

if (file_exists($ip)) {
    $allowedIps = file($ip, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (in_array($clientIp, $allowedIps)) {
        $isAllowed = true;
    }
}

if (isAllowed) {
    include 'allowed.php';
} else {
    include 'not_allowed.php';
}
?>