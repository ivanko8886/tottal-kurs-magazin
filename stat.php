<!DOCTYPE html>
<html>
<head>
    <title>Statistics</title>
</head>
<body>
<h1>Statistics</h1>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        color: #3F3F3F;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        margin-bottom: 10px;
    }
    a {
        display: block;
        text-align: center;
        text-decoration: none;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>
<ul>
    <?php

    $sqlhost='localhost';
    $sqluser='root';
    $sqlpass='';
    $db='заводище';

    $db = new mysqli($sqlhost, $sqluser, $sqlpass, $db);

    if ($db->connect_error) {
        die("Connection failed: ". $db->connect_error);
    }

    // Query the database to get the most frequent buyer
    $sql = "SELECT login, COUNT(*) as count FROM user_order_base GROUP BY login ORDER BY count DESC LIMIT 1";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $most_frequent_buyer = $result->fetch_assoc();
        echo "<li>Most frequent buyer: " . $most_frequent_buyer['login'] . "</li>";
    }

    // Query the database to get the most popular product
    $sql = "SELECT name, COUNT(*) as count FROM user_order_base GROUP BY name ORDER BY count DESC LIMIT 1";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $most_popular_product = $result->fetch_assoc();
        echo "<li>Most popular product: " . $most_popular_product['name'] . "</li>";
    }

    // Query the database to get the highest total cost
    $sql = "SELECT login, SUM(cost) as total_cost FROM user_order_base GROUP BY login ORDER BY total_cost DESC LIMIT 1";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $highest_total_cost = $result->fetch_assoc();
        echo "<li>Highest total cost: " . $highest_total_cost['total_cost'] . " (by user " . $highest_total_cost['login'] . ")</li>";
    }

    $db->close();

    ?>
</ul>
</body>
<a id="product" href='admin_widget_start_screen.html'>назад</a>

</html>