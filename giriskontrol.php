<?php
session_start();

include "inc/fonksiyonlar.inc.php"; // fonksiyonlar sayfasına yönlendirdik

if (!isset($_POST["giris"])) { // formdan gelmiyorsa
    // hata mesajı versin ve giriş sayfasına yönlendirsin
      git("Önce formu doldurunuz!", "giris.php");
}

include "inc/vtbaglan.inc.php"; // veritabanına bağlanma sayfasına yönlendirdik

$sql ="select * from uye where id = :id";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":id"=>$_POST["id"]));

$kayit = $ifade->fetch(PDO::FETCH_ASSOC);

// tek bir sonuç mu dönüyor kontrol etmemiz gerekiyor
if ($kayit == false) { // Böyle bir kullanıcı bilgisi bulunamadı
    //Mesaj ver ve giriş sayfasına git
    git("Kullanıcı adı veya şifre hatalı", "giris.php");
}

// Şifreler aynı mı kontrol edeceğiz
if (!password_verify($_POST["sifre"], $kayit["sifre"])) { // Şifreler farklı
    //Mesaj ver ve giriş sayfasına git
    git("Kullanıcı adı veya şifre hatalı", "giris.php");
}

// Aynıysa bilgileri kaydedeceğiz - oturum olarak - yapılacak
$_SESSION["yetki"] = true;
$_SESSION["kod"] = $kayit["kod"];
$_SESSION["ad"] = $kayit["ad"];
$_SESSION["soyad"] = $kayit["soyad"];
$_SESSION["id"] = $kayit["id"];
$_SESSION["eposta"] = $kayit["eposta"];

$vt = null;

header("Location: index.php");
exit;
?>

