<?php 
include('C:/xampp/htdocs/To-DoList/connPHP/conn.php'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["SignUp"])) {
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password1 = $_POST["Password1"];
    $password2 = $_POST["Password2"];

    // Kullanıcı adının daha önce alınıp alınmadığını kontrol et
    $checkUsernameQuery = "SELECT * FROM users WHERE kullanici_adi = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

    // E-posta adresinin daha önce alınıp alınmadığını kontrol et
    $checkEmailQuery = "SELECT * FROM users WHERE kullanici_email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    // Kullanıcı adı veya e-posta zaten varsa hata mesajı ver
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        echo "<script>alert('Bu kullanıcı adı zaten alınmış!')</script>";
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        echo "<script>alert('Bu e-posta adresi zaten alınmış!')</script>";
    } else {
        // Şifrelerin eşleşip eşleşmediğini kontrol et
        if ($password1 === $password2) {
            //$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (kullanici_adi, kullanici_sifre, kullanici_email) VALUES ('$username', '$password1', '$email')";
            
            $runsql = mysqli_query($conn, $sql);
            
            if ($runsql) {
                // Kayıt başarılı olduğunda yönlendirme
                // header("Location: /To-DoList/NoteInterface/NoteInterface.php");
                header("Location: /To-DoList/HomePage/SignIN/SignIN.html");
                exit(); // Yönlendirme sonrası scriptin çalışmasını durdur
            } else {
                echo "<script>alert('Kayıt işlemi başarısız: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            echo "<script>alert('Şifreler eşleşmiyor!')</script>";
        }
    }

    mysqli_close($conn); // Bağlantıyı kapat
}
?>
