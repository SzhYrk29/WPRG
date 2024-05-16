<!DOCTYPE html>
<html>
<head>
    <title>Liczenie cyfr po przecinku</title>
</head>
<body>

<form method="post">
    <label for="inputNumber">Podaj liczbę zmiennoprzecinkową:</label>
    <input type="text" id="inputNumber" name="inputNumber" required>
    <input type="submit" value="Policz cyfry po przecinku">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputNumber = $_POST['inputNumber'];

    if (is_numeric($inputNumber)) {
        $decimalPointPos = strpos($inputNumber, '.');

        if ($decimalPointPos !== false) {
            $digitsAfterDecimal = strlen(substr($inputNumber, $decimalPointPos + 1));
        } else {
            $digitsAfterDecimal = 0;
        }

        echo "<h2>Wynik:</h2>";
        echo "<p><strong>Oryginalny ciąg:</strong> " . htmlspecialchars($inputNumber) . "</p>";
        echo "<p><strong>Liczba cyfr po przecinku:</strong> " . $digitsAfterDecimal . "</p>";
    } else {
        echo "<h2>Błąd:</h2>";
        echo "<p>Wprowadzony ciąg nie jest liczbą zmiennoprzecinkową.</p>";
    }
}
?>

</body>
</html>
