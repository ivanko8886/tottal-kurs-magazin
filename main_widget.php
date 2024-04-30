<?php
include "class_connect.php"
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="icon" type="image/png" href="logo1.png"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--<link rel="stylesheet" href='style.css' type="text/css" />-->
    <style>


        .line {
            width: 100%;
            height: 10px;
            background-color: #007bff;
            margin: 0 auto;

        }

        @keyframes slide-in {
            0% {
                transform: translateX(-110%);
            }
            100% {
                transform: translateX(90%);
            }
        }
        .form-row {
            display: flex;
            flex-wrap: nowrap;
        }

        .product {
            margin-right: 20px;
            margin-left: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 1px;
            flex-basis: calc(33.33% - 60px);
        }

        @media (max-width: 768px) {
            .form-row {
                flex-wrap: wrap;
            }

            .product {
                flex-basis: calc(100% );
            }
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px);
            height: 30px;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            pointer-events: none;
        }




        a:active {
            background: red;
            color: white;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color:#00007d;
        }

        #basic {
            width: 100%;
            height: auto;
            background-color: #f2f2f2;
        }

        #head-site {
            width: 100%;
            height: 150px;
            background-color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #head-site img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        #start_text {
            color: #fff;
            font-size: 24px;
            margin-right: 20px;
        }

        #start_text_2 {
            color: #fff;
            font-size: 18px;
            margin-right: 20px;
        }

        #contact{color: #fff;
            font-size: 18px;
            margin-right: 20px;

            background-repeat: no-repeat;
            background-position: left center;
            padding-left: 30px;}
        #contact:hover{color: firebrick}
        #menu-top {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #1e425d;
        }

        #menu-top .bg-1 {
            width: 100%;
            max-width: 1500px;
            height: 50px;
            background-color: #1e425d;
        }

        #menu-top .bg-1 ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 20px;
        }

        #menu-top .bg-1 li {
            list-style: none;
        }

        #menu-top .bg-1 li a {
            color: #fff;
            font-size: 18px;
            padding: 0 20px;
            line-height: 50px;
        }
        #menu-top .bg-1 li a:hover{color: #7a2518}
        #menu-top .bg-2 {
            width: 100%;
            height: 20px;
            background-color: #1d4b8f;
        }

        #content {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        #content .right {
            width: 65%;
            height: auto;
            background-color: #fff;
            padding: 20px;
        }

        #content .right h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #content .right p {
            font-size: 18px;
            line-height: 1.5;
        }

        #content .right p img {
            width: 100%;
            height: auto;
        }

        #content .left {
            width: 28%;
            height: auto;
            background-color: #fff;
            padding: 20px;
        }

        #content .left #left-menu {
            width: 100%;
            height: auto;
        }

        #content .left #left-menu .block-nad-menu {
            width: 100%;
            height: 10px;
            background-color: #00B3E6;
        }

        #content .left #left-menu .block-menu {
            width: 100%;
            height: auto;
            background-color: #f2f2f2;
        }

        #content .left #left-menu .block-menu ul {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        #content .left #left-menu .block-menu ul li {
            list-style: none;
        }



        #content .left #left-menu .block-menu ul li {
            list-style: none;
            padding: 10px 0;
        }
        ul li a {
            font-size: 18px;
            padding: 5px 0;
        }


        #left-menu .block-menu ul li em{color: #00B3E6;}
        #content .left #left-menu .block-menu ul li em {
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;

        }


        #content .left #left-menu .block-pod-menu {
            width: 100%;
            height: 10px;
            background-color: #9C1A1C;
        }

        .myclr {}

        #content .left #left-menu .block-pod-menu {
            width: 100%;
            height: 10px;
            background-color: #9C1A1C;
        }


        #podval a {
            color: #fff;
        }

        #podval a:hover {
            color: #f00;
        }
        .block {
            width: 150px;
            height: 150px;
            text-align: center;
        }

        img {
            padding: 10px;
            border: 1px solid #000;
            border-radius: 50%;
        }
    </style>
</head>

<body>
<!-- Основной блок сайта -->
<div id="basic">

    <!-- Шапка сайта -->
    <div id="head-site">

        <img src="logo1.png" alt="image">

        <strong id="start_text">Оналайн-магазин "Интернет-Базар".</strong>
        <a id="start_text_2">г. Москва, ул Пролетарская 777.</a>
        <a id="contact" href="telefon.png">Контактная информация</a>
        <a  style="color:#fff;" href="student.html">ООО "Бедный студент"©2023г.


        Использование материалов сайта возможно только с письменного разрешения владельца сайта.</a>

        <div class="myclr"></div>

        <!-- Подвал -->

        <div class="myclr"></div>
    </div>

    <!-- Верхнее меню сайта -->
    <div id="menu-top">
        <div class="bg-1">
            <ul>


                <li><a href="http://localhost/2/registration.php">Регистрация</a></li>

            </ul>
        </div>
        <div class="bg-2"></div>
    </div>
    <br><p></p>
    <?php


    $sqlhost='localhost';
    $sqluser='root';
    $sqlpass='';
    $db='заводище';

    // Create connection
    $conn = new mysqli($sqlhost, $sqluser, $sqlpass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT  name, specifications, price FROM admining";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $formIndex = 0;

        while($row = $result->fetch_assoc()) {
            if ($formIndex % 3 == 0) {
                echo "<div class='form-row'>";

            }

            echo "<div class='product' id='product-{$row['name']}'>";
            echo "<label for='name_{$row['name']}'>Name:</label>";
            echo "<input type='text' id='name_{$row['name']}' value='{$row['name']}' disabled>";
            echo "<label for='specifications_{$row['name']}'>Specifications:</label>";
            echo "<input type='text' id='specifications_{$row['name']}' value='{$row['specifications']}' disabled>";
            echo "<label for='price_{$row['name']}'>Price:</label>";
            echo "<input type='number' id='cost_{$row['name']}' value='{$row['price']}' disabled>";


            echo'<br><p></p>';
            echo '<div class="line"></div>';
            echo'<br><p></p>';
            echo'<a  id="product" href="order.php?product=' . urlencode($row['name']) . '">посмотреть</a>';

            echo "</div>";
            $formIndex++;

            if ($formIndex % 3 == 0) {
                echo "</div>";
                echo'<br><p></p>';
            }
        }

        if ($formIndex % 1 == 0) {
            echo "</div>";
            echo'<br><p></p>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    <!-- Левое меню и Контент -->


        <!-- Контент - правый блок -->


        <!-- Левое меню - левый блок блок -->


    <button id="but_2" style=" display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;" onclick="location.href='start_screen.html'">старт</button>

</div>
</body>
<!--компьютерные сети танненбаум\ tcp\ip-->
<!--сделать через селект возможность просмотра товара.-->