<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>

<body>
<h1>Reference list</h1>

<ul>
    <?php

    $filename = 'links.txt';

    if (!file_exists($filename)) {
        die("File does not exist.");
    }

    $fileContent = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $links = [];

    foreach ($fileContent as $line) {
        list($url, $description) = explode(';', $line);
        $links[] = [
                'url' => trim($url),
                    'description' => trim($description)
                ];
    }

    foreach ($links as $link) {
        echo '<li><a href="' . htmlspecialchars($link['url']) . '">' . htmlspecialchars($link['description']) . '</a></li>';
    }
    ?>
</ul>

</body>
</html>
