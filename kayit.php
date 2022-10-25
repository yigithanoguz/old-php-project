<?php
$kayitol = true;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kayıt Ol</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="mid">
            <?php
                include "inc/topbar.inc.php";
            ?>

            <div class="container">
                <h1>Kayıt Ol</h1>
                <form method="POST" action="kayitkontrol.php">
                    </br>
                    <label for="ad" class="lbl">Ad</label></br>
                    <input type="text" id="ad" class="txbox" name="ad" oninput="imlecKayit()"></br>

                    <label for="soyad" class="lbl">Soyad</label></br>
                    <input type="text" id="soyad" class="txbox" name="soyad" oninput="imlecKayit()"></br>

                    <label for="id" class="lbl">Kullanıcı Adı</label></br>
                    <input type="text" id="id" class="txbox" name="id" oninput="imlecKayit()"></br>

                    <label for="sifre" class="lbl">Şifre</label></br>
                    <input type="password" id="sifre" class="txbox" name="sifre" oninput="imlecKayit()"></br>

                    <label for="sifrekontrol" class="lbl">Şifreyi Onaylayın</label></br>
                    <input type="password" id="sifrekontrol" class="txbox" name="sifrekontrol" oninput="imlecKayit()"></br>

                    <label for="eposta" class="lbl">E-Posta</label></br>
                    <input type="email" id="eposta" class="txbox" name="eposta" oninput="imlecKayit()"></br>

                    <input type="submit" id="buton" class="btn pasif" name="kayit" value="Kayıt Ol" disabled></br>
                </form>
                    <a href="giris.php" class="mor-yazi">Zaten hesabınız var mı?</a>
            </div>
        </div>

        <script src=script.js></script>

    </body>
</html>