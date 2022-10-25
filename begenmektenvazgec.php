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
  git("Beğenmekten vazgeçmek için gönderi seçmediniz!", "index.php");
}

// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// Sorgular ve diğer işlemler burada...
$sql = "delete from begeni where uyeKod = :uyeKod and postKod = :postKod";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":uyeKod"=>$_SESSION["kod"], ":postKod"=>$_POST["kod"]));
//Bağlantıyı yok edelim...
$vt = null;

$adres = "Location: http://localhost/guitar/index.php#".$_POST["kod"]; // ilgili gönderiye yönlendiriyor
header($adres);

?>
