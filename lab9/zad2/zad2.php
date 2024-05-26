<?php

function manageDirectory ($path, $directory, $operation = "read") {
    if (substr($path, -1) !== '/') {
        $path .= '/';
    }

    $fullPath = $path . $directory;

    switch ($operation) {
        case 'read':
            if (is_dir($fullPath)) {
                $elements = scandir($fullPath);
                if ($elements == false) {
                    return "This directory is empty.";
                }
                $elements = array_diff($elements, array('.', '..'));
                return "Directory contents are: " . implode(', ', $elements);
            } else {
                return "Directory doesn't exist.";
            }

        case 'delete':
            if (is_dir($fullPath)) {
                $elements = scandir($fullPath);
                if ($elements == false || count(array_diff($elements, array('.', '..'))) > 0) {
                    return "Directory is not empty or its contents could not be read.";
                }
                if (rmdir($fullPath)) {
                    return "Directory has been deleted.";
                } else {
                    return "Directory could not be deleted.";
                }
            } else {
                return "Directory doesn't exist.";
            }
            case 'create':
                if (is_dir($fullPath)) {
                    return "Directory already exists.";
                }
                if (mkdir($fullPath, 0777, true)) {
                    return "Directory has been created.";
                } else {
                    return "Directory could not be created.";
                }
        default:
            return "Unknown operation.";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = $_POST['path'];
    $dirname = $_POST['dirname'];
    $operation = isset($_POST['operation']) ? $_POST['operation'] : 'read';

    $result = manageDirectory($path, $dirname, $operation);

    echo '<h1>Result of an operation:</h1>';
    if (is_array($result)) {
        echo '<ul>';
        foreach ($result as $item) {
            echo '<li>' . htmlspecialchars($item) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . htmlspecialchars($result) . '</p>';
    }
}
?>