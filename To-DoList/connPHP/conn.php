<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "todo";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Bağlantı başarısız: " . mysqli_connect_error());
}


?>