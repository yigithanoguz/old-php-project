<?php
session_start();

include "inc/fonksiyonlar.inc.php"; // fonksiyonlar sayfasına yönlendirdik
// oturum açmadıysa gönder
if (!isset($_SESSION["yetki"])) {
  git("Önce giriş yapmalısınız!", "giris.php");
}

// Formdan geldiği halde önce çok büyük boyutta bir dosya mı yüklüyor buna bakalım
if (isset($_GET["formgordu"]) and !isset($_POST["formdangelen"])) {
  git("Yüklemeye çalıştığınız dosya boyutu çok büyük!", "yukle.php");
}

// formdan gelmediyse gönder
if (!isset($_POST["formdangelen"])) {
  git("Yükleme yapmak için önce yükle formu doldurunuz!", "yukle.php");
}

//Dosya yüklerken hata oluştu mu?
if ($_FILES["yuklenenDosya"]["error"] != 0) {
  git("Dosya yüklerken bir hata oluştu!", "yukle.php");
}

// Yüklenen mp4 dosyası mı kontrol et!
// Yüklenen dosyanın tipi ile izin verilen dosya tiplerini karşılaştır.
if ($_FILES["yuklenenDosya"]["type"] == "video/mp4") {
  // devam edecek
} else {
  git("Yükleyeceğiniz dosya bir mp4 dosyası olmalıdır!", "yukle.php");
}

// Dosyayı sunucuya yükleyelim
$hedefKlasor = "yuklenenler/";
$hedefKlasor .= time();
$hedefKlasor = $hedefKlasor.basename($_FILES['yuklenenDosya']['name']);
//basename ile sadece dosyanın ismi alınıyor.
if (move_uploaded_file($_FILES["yuklenenDosya"]['tmp_name'], $hedefKlasor))
{
	// devam eder
} else {
  git("Dosya yükleme işleminde bir hata oluştu!", "yukle.php");
}
// Kaydı veri tabanına yazdıralım
// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php";
// Sorgular ve diğer işlemler burada...
$sql = "insert into post (sahip, dosya, aciklama) values (:sahip, :dosya, :aciklama)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":sahip"=>$_SESSION["kod"], ":dosya"=>$hedefKlasor, ":aciklama"=>$_POST["aciklama"]));
//Bağlantıyı yok edelim...
$vt = null;
git("Dosya başarıyla yüklendi.", "index.php");

?>
<a href="index.php"> Ana sayfaya dön! </a>
