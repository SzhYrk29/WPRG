<?php

include_once ('main.html');

$conn = new mysqli('localhost', 'root', '', 'w12_zadanie3');

$sql = "CREATE TABLE IF NOT EXISTS Users (
    User_ID INT PRIMARY KEY AUTO_INCREMENT,
    First_name VARCHAR(255) NOT NULL,
    Last_name VARCHAR(255) NOT NULL,
    Telephone VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL
)";

$conn->query($sql);

if (isset($_POST['register'])) {
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = $conn->prepare("INSERT INTO Users (First_name, Last_name, Telephone, Email, Password) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('sssss',$_POST['first_name'],$_POST['last_name'],$_POST['telephone'],$_POST['email'], $pass);
    $sql->execute();
    header('Location:main.php');
}

$sql = "SELECT COUNT(User_ID) AS users_count FROM Users";
$sql_result = $conn->query($sql);
$result = $sql_result->fetch_assoc();
if ($result['users_count'] > 0) {
    echo "Amount registered users: " . $result['users_count'] . "<br>";
}

$conn->close();