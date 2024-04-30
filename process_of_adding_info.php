<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data1 = $_POST["data1"];
    $data2 = $_POST["data2"];
    $data3 = $_POST["data3"];
    $data4 = $_POST["data4"];
    $data5 = $_POST["data5"];

    // Проверка, что данные не пусты
    if (!empty($data1) && !empty($data2) && !empty($data3) && !empty($data4) && !empty($data5)&&
     ($data1!=" ") && ($data2!=" ") && ($data3!=" ") && ($data4!=" ") && $data5!=" ") {
        // Открываем или создаем текстовый файл для записи (например, data.txt)
        $file = fopen("data.txt", "a");

        // Записываем данные в файл, разделенные пробелами
        fwrite($file, $data1 . " " . $data2 . " " . $data3 . " " . $data4 . " " . $data5 . PHP_EOL);

        // Закрываем файл
        // Закрываем файл
        fclose($file);

        echo "Данные успешно записаны в файл!";
        sleep(1);
        $new_url = 'user_order_sucess.html';
        header('Location: '.$new_url);
    } else {

        sleep(1);
        $new_url = 'user_order_fail.html';
        header('Location: '.$new_url);
    }
} else {
    // Обработка нажатия кнопки без отправки формы
    echo "Ошибка: Неверный метод запроса.";
}
?>