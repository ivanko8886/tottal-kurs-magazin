<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных о продукте из POST запроса
    $id = $_POST['id'];
    $name = $_POST['name'];
    $characteristics = $_POST['characteristics'];
    $price = $_POST['price'];
    $productionTime = $_POST['productionTime'];
    $deliveryTime = $_POST['deliveryTime'];

    // Добавление данных о продукте в файл
    $newProduct = [
        'id' => $id,
        'name' => $name,
        'characteristics' => $characteristics,
        'price' => $price,
        'productionTime' => $productionTime,
        'deliveryTime' => $deliveryTime
    ];

    $products = json_decode(file_get_contents('products.json'), true);
    $products[] = $newProduct;
    file_put_contents('products.json', json_encode($products));

    // Возврат ответа с успешным статусом
    http_response_code(200);
    echo "Продукт успешно добавлен!";
} else {
    // Возврат ответа с ошибочным статусом
    http_response_code(400);
    echo "Неверный запрос";
}
?>