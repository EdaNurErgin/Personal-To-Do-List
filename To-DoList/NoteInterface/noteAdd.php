<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Oturum başlatılmamışsa başlat
}


include('C:/xampp/htdocs/To-DoList/connPHP/conn.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debug: Gelen POST verisini ve oturum bilgisini kontrol et
// var_dump($_POST); // Gelen veriyi yazdır
// var_dump($_SESSION); // Oturum bilgisini yazdır
// Debug: Oturum bilgilerini yazdır
// var_dump($_SESSION); // $_SESSION içeriğini yazdır

// if (isset($_SESSION['UserID'])) {
//     $userID = $_SESSION['UserID']; // Oturumdaki UserID'yi al
// } else {
//     echo "Oturumda UserID bulunamadı.";
//     exit();
// }

// Oturum bilgisini kontrol et
if (isset($_SESSION['UserID'])) {
    $userID = $_SESSION['UserID']; // Oturumdaki UserID'yi al
} else {
    // Eğer UserID yoksa JSON formatında hata döndür
    echo json_encode(["status" => "error", "message" => "Oturumda UserID bulunamadı."]);
    exit();
}

if (isset($_POST['task'])) {
    
    // if (!isset($_SESSION['UserID'])) {
    //     echo "Oturum açılmamış.";
    //     exit();
    // }
    // Eğer oturum açılmamışsa JSON formatında hata döndür
    if (!isset($_SESSION['UserID'])) {
        echo json_encode(["status" => "error", "message" => "Oturum açılmamış."]);
        exit();
    }

    $task = mysqli_real_escape_string($conn, $_POST['task']); // Kullanıcı girdisini temizle  veritabanına yapılacak sorgularda herhangi bir SQL enjeksiyonu saldırısını önlemek amacıyla yapılır.
    $userID = $_SESSION['UserID'];

    // Notun oluşturulma tarihi ve güncellenme tarihi
    $createdAt = date('Y-m-d');
    $updatedAt = date('Y-m-d');

    // SQL sorgusunu güncelleme
    $sql = "INSERT INTO notes (content, User_Not, created_at, updated_at) 
            VALUES ('$task', '$userID', '$createdAt', '$updatedAt')";

    // if (mysqli_query($conn, $sql)) {
    //     echo "Not başarıyla eklendi!";
    // } else {
    //     echo "Not eklenemedi: " . mysqli_error($conn);
    // }
    if (mysqli_query($conn, $sql)) {
        // Başarı mesajını JSON formatında döndür
        echo json_encode(["status" => "success", "message" => "Not başarıyla eklendi!"]);
    } else {
        // Hata mesajını JSON formatında döndür
        echo json_encode(["status" => "error", "message" => "Not eklenemedi: " . mysqli_error($conn)]);
    }

 
    
  

    mysqli_close($conn); // Bağlantıyı kapat
    exit();
}

?>
