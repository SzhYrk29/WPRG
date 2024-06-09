<?php

include('main.html');

if (!isset($_COOKIE['deleted'])){
    $conn = new mysqli('localhost', 'root', '', 'w12_zadanie1');

    $sql_create = 'CREATE TABLE Student (
    StudentID INT PRIMARY KEY,
    Firstname VARCHAR(255) NOT NULL,
    Secondname VARCHAR(255) NOT NULL,
    Salary INT NOT NULL,
    DateOfBirth DATE NOT NULL
)';

    try {
        $conn->query($sql_create);
        echo 'Table created.<br>';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();

} else {
    setcookie('deleted', true, time() - 60);
    echo 'Table is deleted.<br>';
}q