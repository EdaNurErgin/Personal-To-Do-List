<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Oturum başlatılmamışsa başlat
}
?>

<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
 // Oturum başlatma
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> -->

    
    <!-- <script src="x.js" defer></script> -->

    <script>
        // URL parametresinden 'username' değerini al
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const username = urlParams.get('username') || 'Ziyaretçi';
            alert("Hoşgeldin, " + username + "!");
        };
    </script>
    
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Fredoka One', cursive;
            background-image: url('/To-DoList/HomePage/Img/HomaPageImg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center; /* Yatayda ortalama */
            align-items: flex-start; /* Dikeyde başlangıçta hizalama */
            
        }

        .container {
            box-shadow: 0 0 30px #df4893;
            border: 2px solid #ff77b3;
            width: 80%;  /* Container genişliği ekranın %80'i kadar */
            max-width: 600px; /* Maksimum genişlik belirleyelim */
           
            padding: 20px;
            margin-right: 301px;
        }

        .nav {
            display: flex;
            justify-content: center; /* Yatayda ortalama */
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .nav h2 {
            font-size: 3rem;
            color: #ff69b4; /* Sembol rengi */
            margin: 10px 0;
        }

        .user-input {
            display: flex;
            align-items: center;
            justify-content: center; /* Yatayda ortalama */
            width: 100%;
            padding: 20px;
        }

        .user-input input {
            width: 80%;
            padding: 8px;
            border: 2px solid #ff77b3;
            border-radius: 5px;
            margin-right: 10px;
            box-shadow: 0 0 5px #df4893;
            border: 5px solid #f48fbb;
            transition: 0.3s ease;
        }

        .user-input input:focus {
            box-shadow: 0 0 20px #f48fbb; /* Pembe gölge */
            border: 5px solid #f48fbb; /* Pembe çerçeve */
            
        }

        .user-input button {
            padding: 8px 15px;
            background-color: #ff9eb3;
            border: 3px solid #f48fbb;
            box-shadow: 0 0 5px #df4893;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .user-input button:hover {
            background-color: transparent;
            color: #ff69b4;
        }

        .to-do-items {
            width: 100%;
            margin-top: 20px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ddd;       
            background-image: url('/To-DoList/HomePage/Img/HomePageImg3.jpg');
        }

        .item i {
            cursor: pointer;
            margin-left: 10px;
            
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .user-input input {
                width: 70%;
            }

            .user-input button {
                width: 20%;
            }
        }
         /* Çıkış yap butonunun stili */
         .logout-btn {
            display: block;
            margin: 20px ;
            padding: 10px 20px;
            background-image: url('/To-DoList/HomePage/Img/HomePageImg3.jpg'); /* Pembe resim */
            background-size: cover;
            background-position: center;
            border-radius: 30px;
            color: white;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logout-btn:hover {
            background-color: rgba(255, 105, 180, 0.7); /* Yarı saydam pembe arka plan */
            transform: scale(1.1);
        }

  

    </style>
      <!-- jQuery'yi CDN üzerinden ekleyin -->
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
      <!-- Kendi JavaScript dosyanızı daha sonra ekleyin -->
      <script src="y.js"></script>
</head>
<body>
<div class="container">
    <div class="nav">
        <h2>
            <i class="fas fa-list-ul icon"></i>
            <span class="header-text">To-Do List</span>
        </h2>
        
        <div class="user-input">
           
                <input type="text" id="input" name="task" placeholder="Add a new task">
                <button onclick="addItem()"  id="button">Submit</button>
            
        </div>
        
    </div>
    <div class="to-do-items">
        <!-- To-Do list items will appear here -->
    </div>
    
</div>

<a href="/To-DoList/HomePage/SignIN/cikis.php" class="logout-btn">Çıkış Yap</a>


</body>
</html>
