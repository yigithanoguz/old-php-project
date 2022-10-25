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
if (isset($_POST["kod"])) {
  // devam et
} else {
    git("Yorum yapmak için gönderi seçmediniz!", "index.php");
}

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";

$sql ="select * from post where kod = :kod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kod"=>$_POST["kod"]));
$gonderi = $ifade->fetch(PDO::FETCH_ASSOC);

// Belirtilen koda ait bir gönderi var mı?
if ($gonderi == false) { // Böyle bir gönderi bilgisi bulunamadı
  //Mesaj ver ve profil sayfasına git
  git("Belirttiğiniz koda ait bir gönderi bulunamadı!", "index.php");
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Yorum Yap</title>
</head>
<body>
    
    <?php
        include "inc/topbar.inc.php";
    ?>

    <div class="container">
        <h1>Yorum Yap</h1>
        <form style="margin: 20px;" action="yorumkayit.php" method="POST" id="yorumkayit">
            <input type="hidden" name="kod" value="<?php echo $gonderi["kod"]; ?>">
            <label class="lbl" for="yorum">Yorumunuzu giriniz:</label>
            <textarea name="yorum" id="aciklama" rows="3"></textarea>
            <input type="submit" name="formdangelen" value="Yorum Yap" class="btn aktif">
        </form>
    </div>
</body>
</html>