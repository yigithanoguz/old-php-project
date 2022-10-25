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
  git("Sileceğiniz gönderiyi seçmediniz!", "profil.php");
}

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";

//!!! SANIRIM BEĞENİLER HALA VERİ TABANINDA OLDUĞU İÇİN HATA VERİYOR !!! DÜZELTİLDİ !!!
// Önce gönderiye ait bütün beğenileri siliyoruz...
$sql = "delete from begeni where postKod = :postKod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":postKod"=>$_POST["kod"]));

// Gönderiye ait yorumları da siliyoruz...
$sql = "delete from yorum where postKod = :postKod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":postKod"=>$_POST["kod"]));


// Sorgular ve diğer işlemler burada...
$sql = "delete from post where kod = :kod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kod"=>$_POST["kod"]));



//Bağlantıyı yok edelim...
$vt = null;

// İlgili dosya varsa bunu da silmemiz lazım

git("Gönderi başarıyla silindi.", "index.php");

?>
<a href="index.php"> Ana sayfaya dön! </a>
