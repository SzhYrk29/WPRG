<?php

include('main.html');

$conn = new mysqli('localhost', 'root', '', 'w12_zadanie1');

try {
    $conn->query("DROP TABLE Student");
    $conn->close();
    echo 'Table Student Deleted.<br>';
} catch (Exception $e) {
    setcookie('deleted', true, time() + 86400);
    $conn->close();
    header('Location: main.php');
}