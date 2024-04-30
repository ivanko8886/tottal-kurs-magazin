<?php
session_start();

$username = 'admin';
$password = 'admin';

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['logged_in'] = true;
        header('Location: admin_widget_start_screen.html    ');
    } else {
        echo 'Invalid username or password';
    }
}
?>