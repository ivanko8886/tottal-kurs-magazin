<?php
echo '<style>body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
  text-align: center;
}

p {
  color: #555;
}

a {
  display: block;
  width: 200px;
  margin: 20px auto;
  padding: 10px 20px;
  text-align: center;
  background-color: #4CAF50;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

a:hover {
  background-color: #45a049;
}
</style>';
$sqlhost='localhost';
$sqluser='root';
$sqlpass='';
$db='заводище';
global $r;
global $t;
// Create connection
$conn = new mysqli($sqlhost, $sqluser, $sqlpass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productName = $_GET['product'];

$sql = "SELECT name, specifications, price FROM admining WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $productName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "<h1>Selected Product:</h1>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
    echo "<p><strong>Specifications:</strong> " . htmlspecialchars($row['specifications']) . "</p>";
    echo "<p><strong>Price:</strong> " . htmlspecialchars($row['price']) . "</p>";
    echo "<a href='http://localhost/bd6/index.php?r=" . urlencode(htmlspecialchars($row['name'])) . "&t=" . urlencode(htmlspecialchars($row['price'])) . "'>View Widget</a>";

}
$r=htmlspecialchars($row['name']);
$t=htmlspecialchars($row['price']);
?>