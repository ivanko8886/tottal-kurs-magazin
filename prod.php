<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Forms</title>
    <style>

        .line {
            width: 100%;
            height: 10px;
            background-color: #007bff;
            margin: 0 auto;
            animation: slide-in 5s ease-in-out infinite;
        }

        @keyframes slide-in {
            0% {
                transform: translateX(-110%);
            }
            100% {
                transform: translateX(110%);
            }
        }
        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .form {
            width: 45%;
            height: 100%;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            overflow: auto;
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



        a {
            outline: none;
            text-decoration: none;
            display: inline-block;
            width: 19.5%;
            margin-right: 0.625%;
            text-align: center;
            line-height: 3;
            color: black;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }



        a:link,
        a:visited,
        a:focus {
            background: yellow;
        }

        a:hover {
            background: orange;
            border-color: orange;
            color: white;
        }

        a:active {
            background: red;
            color: white;
        }
    </style>
</head>
<body>

<div class="form-container">


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

    $sql = "SELECT id, name, specifications, cost, delivery_time, production_time FROM admining";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $formIndex = 0;

        while($row = $result->fetch_assoc()) {
            if ($formIndex % 2 == 0) {
                echo "<div class='form'>";
            }

            echo "<label for='id{$row['id']}'>ID:</label>";
            echo "<input type='text' id='id{$row['id']}' value='{$row['id']}' disabled>";
            echo "<label for='name_{$row['id']}'>Name:</label>";
            echo "<input type='text' id='name_{$row['id']}' value='{$row['name']}' disabled>";
            echo "<label for='specifications_{$row['id']}'>Specifications:</label>";
            echo "<input type='text' id='specifications_{$row['id']}' value='{$row['specifications']}' disabled>";
            echo "<label for='cost_{$row['id']}'>Cost:</label>";
            echo "<input type='number' id='cost_{$row['id']}' value='{$row['cost']}' disabled>";
            echo "<label for='delivery_time_{$row['id']}'>Delivery Time:</label>";
            echo "<input type='number' id='delivery_time_{$row['id']}' value='{$row['delivery_time']}' disabled>";
            echo "<label for='production_time_{$row['id']}'>Production Time:</label>";
            echo "<input type='number' id='production_time_{$row['id']}' value='{$row['production_time']}' disabled>";

            echo'<br><p></p>';
            echo '<div class="line"></div>';
            echo '<br><p></p><a id="product" href="main_widget.php">назад</a>';
            echo'<br><p></p>';

            $formIndex++;

            if ($formIndex % 2 == 0) {
                echo "</div>";
            }
        }

        if ($formIndex % 2 != 0) {
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

</div>

</body>
</html>