<?php

include "inc/fonksiyonlar.inc.php"; // fonksiyonlar sayfasına yönlendirdik


// Direkt gelmesine izin verme
if (!isset($_POST["kayit"])) { // formdan gelmiyorsa // submit butondaki name
  // hata mesajı versin ve giriş sayfasına yönlendirsin
    git("Önce formu doldurunuz!", "kayit.php");

}
// Veri tabanına bağlanalım...
include "inc/vtbaglan.inc.php"; // veritabanına bağlanma sayfasına yönlendirdik
// Şifrelerle ilgili bir şeyler
$sifre = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

// Daha önce bu kullanıcı adı kullanılmış mı?
$sql ="select * from uye where id = :id";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":id"=>$_POST["id"]));
$kayit = $ifade->fetch(PDO::FETCH_ASSOC);

// veri tabanında böyle biri var mı?
if ($kayit != false) { // Böyle bir kullanıcı bilgisi bulunursa
  //Mesaj ver ve giriş sayfasına git
  git("Bu kullanıcı adı zaten alınmış!", "kayit.php");
  exit;
}

// Sorgular ve diğer işlemler burada...
$sql = "insert into uye (ad, soyad, id, sifre, eposta) values (:ad, :soyad, :id, :sifre, :eposta)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":ad"=>$_POST["ad"], ":soyad"=>$_POST["soyad"], ":id"=>$_POST["id"], ":sifre"=>$sifre, ":eposta"=>$_POST["eposta"]));
//Bağlantıyı yok edelim...
$vt = null;

git("Başarıyla kayıt oldunuz!", "giris.php");

?>