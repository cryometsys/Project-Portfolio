<?php
require_once './db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $message = $_POST["message"];

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO mailtable (name, mail, text) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location='../index.html';</script>";
        $conn->close();
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
