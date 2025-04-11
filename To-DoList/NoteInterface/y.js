
    $(document).ready(function(){
        // Enter tuşu ile not eklemek için event listener
        $("#input").on("keydown", function(event){
            if (event.key === "Enter") {
                event.preventDefault();  // Sayfa yenilenmesini engelle
                addItem();  // addItem fonksiyonunu çağır
            }
        });

        // Butona tıklama ile not ekleme
        $("#button").on("click", function(event){
            event.preventDefault(); // Formun submit edilmesini engelle
            addItem();  // addItem fonksiyonunu çağır
        });
    });

 
    function addItem() {
        var input = $("#input").val();  // Input değerini al
        if (input.trim() === "") return; // Eğer input boşsa çık
    
        // AJAX ile sunucuya veri gönderme
        $.ajax({
            url: '/To-DoList/NoteInterface/noteAdd.php', // Verilerin gönderileceği PHP dosyası
            type: 'POST', // POST metodunu kullan
            async: false,
            xhrFields: { withCredentials: true }, // Oturum bilgilerini koru
            data: { task: input }, // Gönderilecek veri
            dataType: 'json',  // Response JSON olarak bekleniyor

            success: function(response) {
                console.log("PHP'den gelen yanıt:", response);
                // AJAX başarılı olursa yeni öğeyi ekle
                if (response.status === "success") {
                    var divParent = document.createElement("div");
                    divParent.className = "item";
                    divParent.innerHTML = '<div>' + input + '</div>';
    
                    var divChild = document.createElement("div");
                    var checkIcon = document.createElement("i");
                    checkIcon.className = "fas fa-check";
                    checkIcon.style.color = "black";
                    checkIcon.addEventListener("click", function() {
                        checkIcon.style.color = "limegreen"; // Görev tamamlandığında renk değişir
                    });
    
                    var trashIcon = document.createElement("i");
                    trashIcon.className = "fas fa-trash";
                    trashIcon.style.color = "black";
                    trashIcon.addEventListener("click", function() {
                        divParent.remove(); // Silme işlemi
                    });
    
                    divChild.appendChild(checkIcon);
                    divChild.appendChild(trashIcon);
                    divParent.appendChild(divChild);
                    document.querySelector(".to-do-items").appendChild(divParent);
    
                    $("#input").val(''); // Input'u temizle
                } else {
                    console.error("Hata: " + response);
                    alert("Bir şeyler ters gitti. Lütfen tekrar deneyin.");
                }
            },
            error: function() {
                alert("Bir hata oluştu. Lütfen tekrar deneyin.");
            }
        });
        
    }
    
    $(document).ready(function() {
        // Çöp kutusu butonuna tıklama
        $(".to-do-items").on("click", ".fas.fa-trash", function() {
            var itemDiv = $(this).closest('.item'); // Silinmek istenen notu bul
            var noteId = itemDiv.data('note-id'); // data-note-id özelliğinden notun id'sini al
    
            // AJAX ile veritabanından silme isteği gönder
            $.ajax({
                url: '/To-DoList/NoteInterface/noteDelete.php', // Silme işlemini yapan PHP dosyasına istek gönder
                type: 'POST', // POST metodunu kullan
                data: { id: noteId }, // Gönderilecek veri: notun ID'si
                success: function(response) {
                    if (response.trim() === 'success') {
                        itemDiv.remove(); // Veritabanından silindikten sonra notu HTML'den de sil
                    } else {
                        alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                    }
                },
                error: function() {
                    alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            });
        });
    });
    