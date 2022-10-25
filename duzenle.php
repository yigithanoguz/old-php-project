<?php
session_start();
// git ve diğer fonksiyonları dahil edelim
include "inc/fonksiyonlar.inc.php";

// Giriş yapmayan bu formu göremesin
if (isset($_SESSION["yetki"]) and $_SESSION["yetki"] == true) {
  // devam et
} else {
    git("Önce giriş yapmalısınız!", "giris.php");
}

// $_POST["kod"] olmadan sayfa görülmesin
if (isset($_POST["kod"]) and is_numeric($_POST["kod"])) {
  // devam et
} else {
    git("Düzenlemek için gönderi seçmediniz!", "profil.php");
}

// $_POST["kod"] hangi ilan düzenlenecek bilgisini veriyor

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// select * from uye where id = ?
$sql ="select * from post where kod = :kod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kod"=>$_POST["kod"]));
$gonderi = $ifade->fetch(PDO::FETCH_ASSOC);

// Belirtilen koda ait bir gönderi var mı?
if ($gonderi == false) { // Böyle bir gönderi bilgisi bulunamadı
  //Mesaj ver ve profil sayfasına git
  git("Belirttiğiniz koda ait bir gönderi bulunamadı!", "profil.php");
}

// Giriş yapan kişi aynı zamanda ürün sahibi mi?
if ($gonderi["sahip"] != $_SESSION["kod"]) {
  git("Bu ürünü güncellemeye yetkiniz yok!", "index.php");
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
        <h1>Gönderi Düzenle</h1>
        <form style="margin: 20px;" enctype="multipart/form-data" action="duzenlekontrol.php" method="POST" id="duzenle">
            <input type="hidden" name="kod" value="<?php echo $gonderi["kod"]; ?>">
            <label class="lbl" for="aciklama">Açıklama giriniz:</label>
            <textarea name="aciklama" id="aciklama" rows="3"><?php echo $gonderi["aciklama"]; ?></textarea>
            <input type="submit" name="formdangelen" value="Güncelle" class="btn aktif">
        </form>
    </div>
</body>
</html>