<?php
session_start();

// Kaydı veri tabanına yazdıralım
include "inc/fonksiyonlar.inc.php";
// oturum açmadıysa gönder
if (!isset($_SESSION["yetki"]) and $_SESSION["yetki"] == false) {
  git("Önce giriş yapmalısınız!", "giris.php");
}
// formdan gelmediyse gönder
if (!isset($_POST["formdangelen"])) {
    git("Düzenlemek için gönderi seçmediniz!", "profil.php");
}

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// Sorgular ve diğer işlemler burada...
$sql = "update post set aciklama = :aciklama where kod = :kod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":aciklama"=>$_POST["aciklama"], ":kod"=>$_POST["kod"]));
//Bağlantıyı yok edelim...
$vt = null;
git("Gönderi açıklaması başarıyla güncellendi.", "index.php");

?>
<a href="index.php"> Ana sayfaya dön! </a>
