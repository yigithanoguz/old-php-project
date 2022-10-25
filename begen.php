<?php
session_start();

// Kaydı veri tabanına yazdıralım
include "inc/fonksiyonlar.inc.php";
// oturum açmadıysa gönder
if (!isset($_SESSION["yetki"])) {
  git("Önce giriş yapmalısınız!", "giris.php");
}

// formdan gelmediyse gönder (BENİM YÖNTEMİM yiğithan)
if (!isset($_POST["kod"])) {
  git("Beğenmek için gönderi seçmediniz!", "index.php");
}

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// Sorgular ve diğer işlemler burada...
$sql = "insert into begeni (uyeKod, postKod) values (:uyeKod, :postKod)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":uyeKod"=>$_SESSION["kod"], ":postKod"=>$_POST["kod"]));
//Bağlantıyı yok edelim...
$vt = null;

$adres = "Location: http://localhost/guitar/index.php#".$_POST["kod"]; // beğenilen gönderiye yönlendiriyor
header($adres);

?>
