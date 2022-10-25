<?php
    session_start();
    $yukle = true; // bu sayfaya özel
    include "inc/fonksiyonlar.inc.php";
    // oturum açmadıysa gönder
    if (!isset($_SESSION["yetki"])) {
        git("Önce giriş yapmalısınız!", "giris.php");
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Video Yükle</title>
</head>
<body>
    
    <?php
        include "inc/topbar.inc.php";
    ?>

    <div class="container">
        <h1>Video Yükle</h1>
        <form style="margin: 20px;" enctype="multipart/form-data" action="yuklekontrol.php?formgordu=1" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="268435456">
            <label class="lbl" for="dosya">Dosya seçiniz (Max boyut: 256 MB)</label>
            <input type="file" name="yuklenenDosya" id="dosya"><br>
            <label class="lbl" for="aciklama">Açıklama giriniz:</label>
            <textarea name="aciklama" id="aciklama" rows="3"></textarea>
            <input type="submit" name="formdangelen" value="Yükle" class="btn aktif">
        </form>
    </div>
</body>
</html>