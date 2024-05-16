<!DOCTYPE html>
<html>
<head>
    <title>Liczenie samogłosek</title>
</head>
<body>

<form method="post">
    <label for="inputString">Podaj ciąg znaków:</label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="Policz samogłoski">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];

    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $vowelCount = 0;

    for ($i = 0; $i < strlen($inputString); $i++) {
        if (in_array(strtolower($inputString[$i]), $vowels)) {
            $vowelCount++;
        }
    }

    echo "<h2>Wynik:</h2>";
    echo "<p><strong>Oryginalny ciąg:</strong> " . htmlspecialchars($inputString) . "</p>";
    echo "<p><strong>Liczba samogłosek:</strong> " . $vowelCount . "</p>";
}
?>

</body>
</html>
