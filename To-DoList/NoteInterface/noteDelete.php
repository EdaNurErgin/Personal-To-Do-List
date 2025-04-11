<?php 

session_start();

include('C:/xampp/htdocs/To-DoList/connPHP/conn.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kullanıcının oturum açıp açmadığını kontrol edin
if (!isset($_SESSION['UserID'])) {
    echo "Oturum açılmamış.";
    exit();
}

// POST verisini al ve temizle
if (isset($_POST['id'])) { // Not ID'si
    $note_id = intval($_POST['id']); // Gelen değeri tam sayı olarak al
    $userID = intval($_SESSION['UserID']); // Oturumdaki kullanıcının ID'si

    // Notu kullanıcı ID'sine bağlı olarak sil
    $sql = "DELETE FROM notes WHERE User_Not = '$userID' AND id='$note_id'";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    exit();
} else {
    echo "Geçersiz istek.";
    exit();
}








?>