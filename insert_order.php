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

// Get form data
$login = $_POST['login'];
$name = $_POST['name'];
$specifications = $_POST['specifications'];
$price = $_POST['price'];
$count = $_POST['count'];
$cost = $_POST['cost'];

// Insert data into user_order_base table
$sql = "INSERT INTO user_order_base (login, product_name, specifications, price, count, cost) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdidi", $login, $name, $specifications, $price, $count, $cost);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>