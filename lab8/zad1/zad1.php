<!DOCTYPE html>
<html>
<head>
    <title>Formatowanie ciągu znaków</title>
</head>
<body>

<form method="post">
    <label for="inputString">Podaj ciąg znaków:</label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="Wyślij">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];

    echo "<h2>Wyniki:</h2>";

    echo "<p><strong>Dużymi literami:</strong> " . strtoupper($inputString) . "</p>";

    echo "<p><strong>Małymi literami:</strong> " . strtolower($inputString) . "</p>";

    echo "<p><strong>Pierwsza litera dużą literą:</strong> " . ucfirst(strtolower($inputString)) . "</p>";

    echo "<p><strong>Każde słowo z dużą literą:</strong> " . ucwords(strtolower($inputString)) . "</p>";
}
?>

</body>
</html>
