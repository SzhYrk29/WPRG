<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage MySQL Database</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
        }
        table, tr, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=w12_zadanie2", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $personCreate = 'CREATE TABLE IF NOT EXISTS Person (
    Person_ID INT PRIMARY KEY AUTO_INCREMENT,
    First_name VARCHAR(64) NOT NULL,
    Last_name VARCHAR(64) NOT NULL,
    Email VARCHAR(64) NOT NULL
)';

    $conn->exec($personCreate);

    $carCreate = 'CREATE TABLE IF NOT EXISTS Cars (
    Cars_ID INT PRIMARY KEY AUTO_INCREMENT,
    Model VARCHAR(64) NOT NULL,
    Year INT NOT NULL,
    Price INT NOT NULL,
    Person_ID INT NOT NULL,
    FOREIGN KEY (Person_ID) REFERENCES Person(Person_ID) ON DELETE CASCADE
)';

    $conn->exec($carCreate);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

// INSERT INTO, EDIT OR DELETE

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addPerson'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];

        $insertPerson = 'INSERT INTO Person (First_name, Last_name, Email) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($insertPerson);
        $stmt->execute([$firstname, $lastname, $email]);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    } else if (isset($_POST['editPerson'])) {
        header('Location: editPerson.php');
    } else if (isset($_POST['deletePerson'])) {
        $id = $_POST['person_id'];

        $deletePerson = 'DELETE FROM Person WHERE Person_ID = ?';
        $stmt = $conn->prepare($deletePerson);
        $stmt->execute([$id]);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    } else if (isset($_POST['addCar'])) {
        $model = $_POST['model'];
        $year = $_POST['year'];
        $price = $_POST['price'];
        $personID = $_POST['person_id'];

        $insertCar = 'INSERT INTO Cars (Model, Year, Price, Person_ID) VALUES (?, ?, ?, ?)';
        $stmt = $conn->prepare($insertCar);
        $stmt->execute([$model, $year, $price, $personID]);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    } else if (isset($_POST['editCar'])) {
        header('Location: editCar.php');
    } else if (isset($_POST['deleteCar'])) {
        $id = $_POST['car_id'];

        $deleteCar = 'DELETE FROM Cars WHERE Cars_ID = ?';
        $stmt = $conn->prepare($deleteCar);
        $stmt->execute([$id]);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

?>

<h1>Manage MySQL Database</h1>

<h3>Add Person</h3>

<form name="person" action="" method="POST">
    <input type="hidden" name="person_id" value="">
    <input type="text" name="first_name" placeholder="First Name" required><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br>
    <input type="text" name="email" placeholder="Email" required><br>
    <input type="submit" name="addPerson" value="Add Person">
</form>

<h3>Add Car</h3>
<form name="car" action="" method="POST">
    <input type="hidden" name="car_id" value="">
    <input type="text" name="model" placeholder="Model" required><br>
    <input type="text" name="year" placeholder="Year" required><br>
    <input type="text" name="price" placeholder="Price"required><br>
    <select name="person_id" required>
        <?php
        $persons = $conn->query("SELECT * FROM Person");
        while ($person = $persons->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$person['Person_ID']}'>{$person['First_name']} {$person['Last_name']}, {$person['Email']}</option>";
        }
        ?>
    </select><br>
    <input type="submit" name="addCar" value="Add Car">
</form>

<h3>Persons</h3>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $persons = $conn->query("SELECT * FROM Person");
    while ($person = $persons->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$person['Person_ID']}</td>
            <td>{$person['First_name']}</td>
            <td>{$person['Last_name']}</td>
            <td>{$person['Email']}</td>
            <td>
            <form method='POST' style='display:inline'>
            <input type='hidden' name='person_id' value='{$person['Person_ID']}'>
                    <input type='hidden' name='firstname' value='{$person['First_name']}'>
                    <input type='hidden' name='lastname' value='{$person['Last_name']}'>
                    <input type='hidden' name='email' value='{$person['Email']}'>
            <input type='submit' name='editPerson' value='Edit'>
            </form>
            <form method='POST' style='display:inline' onsubmit=\"return confirm('Are you sure you want to delete this record?');\">
                    <input type='hidden' name='person_id' value='{$person['Person_ID']}'>
                    <input type='submit' name='deletePerson' value='Delete'>
                </form>
                </td>
                </tr>";
    }
    ?>
    </tbody>
</table>

<h3>Cars</h3>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Year</th>
        <th>Price</th>
        <th>Person ID</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cars = $conn->query("SELECT * FROM Cars");
    while ($car = $cars->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$car['Cars_ID']}</td>
            <td>{$car['Model']}</td>
            <td>{$car['Year']}</td>
            <td>{$car['Price']}</td>
            <td>{$car['Person_ID']}</td>
            <td>
            <form method='POST' style='display:inline'>
            <input type='hidden' name='car_id' value='{$car['Cars_ID']}'>
                    <input type='hidden' name='model' value='{$car['Model']}'>
                    <input type='hidden' name='year' value='{$car['Year']}'>
                    <input type='hidden' name='price' value='{$car['Price']}'>
                    <input type='hidden' name='person_id' value='{$car['Person_ID']}'>
            <input type='submit' name='editCar' value='Edit'>
            </form>
            <form method='POST' style='display:inline' onsubmit=\"return confirm('Are you sure you want to delete this record?');\">
                    <input type='hidden' name='car_id' value='{$car['Cars_ID']}'>
                    <input type='submit' name='deleteCar' value='Delete'>
                </form>
                </td>
                </tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>