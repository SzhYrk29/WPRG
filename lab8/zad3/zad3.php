<!DOCTYPE html>
<html>
<head>
    <title>Aplikacja dla wykonywania operacji na ciągach znaków</title>
</head>
<body>

<form method="post">
    <h2>Aplikacja dla wykonywania operacji na ciągach znaków</h2>
    <label for="input"><strong>Podaj ciąg znaków:</strong></label><br>
    <input type="text" id="input" name="input" required><br><br>

    <label for="operation"><strong>Wybierz operacje:</strong></label><br>
    <select name="operation" id="operation">
        <option value="odwrocenie">Odwrócenie ciągu znaków</option>
        <option value="wielkie_litery">Zamiana wszystkich liter na wielkie</option>
        <option value="male_litery">Zamiana wszystkich liter na małe</option>
        <option value="liczenie">Liczenie liczby znaków</option>
        <option value="usuwanie">Usuwanie białych znaków z początku i końca ciągu</option>
    </select>
    
    <input type="submit" value="Wykonaj">

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $operation = $_POST['operation'];
    $input = $_POST['input'];

    switch ($operation) {
        case 'odwrocenie':
            $result = strrev($input);
            echo "<h2>Wynik:</h2>";
            echo "<p><strong>Oryginalny ciąg: </strong>" . $input . "</p>";
            echo "<p><strong>Zmodyfikowany: </strong>" . $result . "</p>";
            break;
            case 'wielkie_litery':
                $result = strtoupper($input);
                echo "<h2>Wynik:</h2>";
                echo "<p><strong>Oryginalny ciąg: </strong>" . $input . "</p>";
                echo "<p><strong>Zmodyfikowany: </strong>" . $result . "</p>";
                break;
                case 'male_litery':
                    $result = strtolower($input);
                    echo "<h2>Wynik:</h2>";
                    echo "<p><strong>Oryginalny ciąg: </strong>" . $input . "</p>";
                    echo "<p><strong>Zmodyfikowany: </strong>" . $result . "</p>";
                    break;
                    case 'liczenie':
                        $result = strlen($input);
                        echo "<h2>Wynik:</h2>";
                        echo "<p><strong>Oryginalny ciąg: </strong>" . $input . "</p>";
                        echo "<p><strong>Zmodyfikowany: </strong>" . $result . "</p>";
                        break;
        case 'usuwanie':
            $result = trim($input);
            echo "<h2>Wynik:</h2>";
            echo "<p><strong>Oryginalny ciąg: </strong>" . $input . "</p>";
            echo "<p><strong>Zmodyfikowany: </strong>" . $result . "</p>";
            break;
    }
}
?>

</body>
</html>