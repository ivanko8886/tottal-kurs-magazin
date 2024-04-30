<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="logo1.png" />

    <title>Заказ товара.вид пользователя.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A5D6D9;
        }

        form {
            width: 500px;
        }

        label {
            display: block;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }

        select {
            padding: 10px;
            margin-top: 5px;
        }

        #Block2 {
            display: none;
        }

        button {
            background-color: #00B3E6;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        a {
            opacity: 0.7;
            transition: opacity 0.3s ease;
            background-color: #483D8B;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
            font-size: 18px;
            text-decoration: none;
        }

        .wrapper {
            position: fixed;
            top: 53%;
            left: 50%;
            transform: translate(-45%, -50%);
            width: 480px;
            border-radius: 17px;
            background: #F5F5F5;
            padding: 20px 25px 40px;
            box-shadow: 0 10px 15px rgba(10, 0, 0, 100);
        }

        .wrapper :where(textarea, input) {
            outline: none;
            border: none;
            font-size: 17px;
            border-radius: 5px;
            color: #5a01a7;
        }

        .wrapper :where(textarea, input)::placeholder {
            color: #17A2B8;
        }

        .wrapper :where(textarea, input):focus {
            box-shadow: 10px 2px 4px rgba(100, 0, 0);
        }
    </style>
</head>

<body>
<br>
<a style="position: absolute;top:60px" href='start_screen.html'>start page</a>
<a href='main_widget.php'>main page</a>
<br>

<form action="http://localhost/bd5/index.php" method="POST">
    <div class="wrapper">
        <label for="id">Введите ваш id:</label>
        <input placeholder="input your id" type="text" id="id" name="id" required><br>
        <p></p>
        <label for="name_product">Выберите name продукта:</label>

        <?php

        // Установка подключения к базе данных
        $sqlhost='localhost';
        $sqluser='root';
        $sqlpass='';
        $db='заводище';

        $conn = new mysqli($sqlhost, $sqluser, $sqlpass, $db);

        // Проверка соединения
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Запрос для выборки данных из таблицы admining
        $sql = "SELECT name, delivery_time, production_time, cost FROM admining";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Вывод данных в виде опций для выбора
            echo "<select id='name_product' name='name_product'>";
            while($row = $result->fetch_assoc()) {
                echo "<option value='". $row['name']. "' data-delivery-time='". $row['delivery_time']. "' data-production-time='". $row['production_time']. "' data-price='". $row['cost']. "'>". $row['name']. "</option>";                }
            echo "</select>";

        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        <br>
        <p></p>
        <label for="count">Введите количество продукции:</label>
        <input placeholder="input count" type="text" id="count" name="count" required><br>
        <p></p>
        <label for="price">Цена за единицу:</label><!--АВТОМАТИЧЕСКИ ИЗ ФОРМЫ-->
        <input placeholder="price" type="text" id="price" name="price" required><br>

        <input type="hidden" placeholder="cost"  id="cost" name="cost" required><br>

        <div>
            <label for="p_t">Время изготовления:</label><!--АВТОМАТИЧЕСКИЙ РАСЧЕТ-->
            <input placeholder="production time" type="text" id="p_t" name="p_t" required>
            <br><p></p><label for="p_t">нужна доставка?</label><!--АВТОМАТИЧЕСКИЙ РАСЧЕТ-->
            <br>
            <label for="delivery_included">ДА:</label>
            <input type="radio" id="delivery_included" name="delivery_included" value="true">
            <label for="delivery_excluded">НЕТ:</label>
            <input type="radio" id="delivery_excluded" name="delivery_included" value="false" checked>
        </div>
        <p id="Block2">
           <label for="delivery_time">Время доставки:</label>
            <input placeholder="delivery time" type="text" id="delivery_time" name="delivery_time" required>

        </p>
        <p></p>

        <button style="width:150px;border-radius: 25px">отправить заказ</button>
    </div>
</form>

<!-- Include the choose.php file -->

<script> var selectBox = document.getElementById("name_product");
                var deliveryTimeInput = document.getElementById("delivery_time");
                var productionTimeInput = document.getElementById("p_t");
                var priceInput = document.getElementById("price");
                var deliveryIncludedInput = document.getElementById("delivery_included");
                var deliveryExcludedInput = document.getElementById("delivery_excluded");
                var Block2 = document.getElementById("Block2"); selectBox.addEventListener("change", function() {
                    var selectedOption = selectBox.options[selectBox.selectedIndex];
                    var deliveryTime = selectedOption.getAttribute("data-delivery-time");
                    var productionTime = selectedOption.getAttribute("data-production-time");
                    var cost = selectedOption.getAttribute("data-price");
                    deliveryTimeInput.value = deliveryTime;
                    productionTimeInput.value = productionTime;
                    priceInput.value = cost; });
                deliveryExcludedInput.addEventListener("change", function() {
                    if (deliveryExcludedInput.checked) {
                        Block2.style.display = "none";
                        deliveryTimeInput.value = "0";
                    } }); deliveryIncludedInput.addEventListener("change", function()
    { if (deliveryIncludedInput.checked) { Block2.style.display = "block"; } }); </script>
</body>

</html>