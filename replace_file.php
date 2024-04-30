<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = __DIR__ . '/data.txt';
    if (file_exists($file)) {
        unlink($file); // Удаляем существующий файл
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $file);
}
?>