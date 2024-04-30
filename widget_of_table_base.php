<?php

// Файл, с которым работаем
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="data.txt"');

$file = __DIR__ . '/data.txt';

if (file_exists($file)) {
    readfile($file);
} else {
    echo "Файл data.txt не найден.";
}
?>
