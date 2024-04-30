<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Widget</title>
</head>
<body>
<h1>Welcome to the next widget!</h1>
<p>You are now logged in as admin.</p>
<a href="logout.php">Logout</a>
</body>
</html>