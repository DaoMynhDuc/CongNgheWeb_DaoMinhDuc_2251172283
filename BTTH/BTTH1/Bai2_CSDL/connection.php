<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizz";

// ket noi csdl
$conn = new mysqli($servername, $username, $password, $dbname);

// kiem tra
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
