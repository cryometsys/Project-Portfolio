<?php
session_start();
require_once 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header('Location: admin-panel.php');
} else {
    echo "Invalid username or password";
}
