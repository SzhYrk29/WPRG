<!DOCTYPE html>
<html>
<head>
    <title>Filtracja ciągu liczb</title>
</head>
<body>

<form method="post">
    <label for="inputString">Podaj ciąg liczb z niepożądanymi znakami:</label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="Filtruj">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];

    $unwantedChars = ['\\', '/', ':', '*', '?', '"', '<', '>', '|', '+', '-', '.'];

    $filteredString = str_replace($unwantedChars, '', $inputString);

    echo "<h2>Wynik:</h2>";
    echo "<p><strong>Oryginalny ciąg:</strong> " . htmlspecialchars($inputString) . "</p>";
    echo "<p><strong>Przefiltrowany ciąg:</strong> " . htmlspecialchars($filteredString) . "</p>";
}
?>

</body>
</html>
