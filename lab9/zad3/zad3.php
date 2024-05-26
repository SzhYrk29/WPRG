<?php
$filename = 'counter.txt';

if (!file_exists($filename)) {
    $visitCount = 1;
    file_put_contents ($filename, $visitCount);
} else {
    $visitCount = (int)file_get_contents($filename);
    $visitCount++;
    file_put_contents($filename, $visitCount);
}

echo $visitCount;

?>