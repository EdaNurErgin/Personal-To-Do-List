<?php 
session_start(); 

include('C:/xampp/htdocs/To-DoList/connPHP/conn.php'); 

error_reporting(E_ALL);
ini_set('error_log', 'C:\xampp\htdocs\To-DoList\HomePage\SignIN\php-error.log');  // Hata loglarını 'php-error.log' dosyasına kaydetme

ini_set('display_errors', 1);


// Veritabanı bağlantısını kontrol et
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

if (isset($_POST["SignIn"])) {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Kullanıcı adı ve şifre boş olamaz
    if (empty($username) || empty($password)) {
        echo "Kullanıcı adı veya şifre boş olamaz!";
        exit();
    }

    // SQL sorgusunu hazırlıyoruz
    $runsql = "SELECT * FROM users WHERE kullanici_adi='$username' AND kullanici_sifre='$password' ";
    echo "SQL Sorgusu: " . $runsql; // Sorguyu ekrana yazdırıyoruz

    $result = mysqli_query($conn, $runsql);

    //Kullanıcı bulunduysa, giriş başarılı
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result); // Veritabanı sonucunu al
        $_SESSION['UserName'] = $row['kullanici_adi'];
        $_SESSION['UserID'] = $row['id'];
    
        // header("Location: /To-DoList/NoteInterface/NoteInterface.html");
        header("Location: /To-DoList/NoteInterface/NoteInterface.php?username=" . urlencode($username));

        exit(); // İşlemi sonlandır
    } else {
        // Kullanıcı bulunamadıysa, hata mesajı göster
        echo "<script>alert('Kullanıcı Adı veya Şifre Hatalı')</script>";
    }

    mysqli_close($conn); // Bağlantıyı kapat
}
?>
