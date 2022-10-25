<?php
session_start();

include "inc/fonksiyonlar.inc.php";
// oturum açmadıysa gönder
if (!isset($_SESSION["yetki"]) and $_SESSION["yetki"] == false) {
  git("Önce giriş yapmalısınız!", "giris.php");
}

// formdan gelmediyse gönder
if (!isset($_POST["formdangelen"])) {
  git("Önce gönderi seçiniz ve yorumunuzu giriniz!", "index.php");
}

// Kaydı veri tabanına yazdıralım
// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// Sorgular ve diğer işlemler burada...
$sql = "insert into yorum (uyeKod, postKod, metin)  values (:uyeKod, :postKod, :metin)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":uyeKod"=>$_SESSION["kod"], ":postKod"=>$_POST["kod"], ":metin"=>$_POST["yorum"]));
//Bağlantıyı yok edelim...
$vt = null;
$adres = "Location: detay.php?kod=".$_POST["kod"];
header($adres);
?>
