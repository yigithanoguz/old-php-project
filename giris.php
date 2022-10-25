<?php
$giris = true;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Giriş Yap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="mid">
            <?php
                include "inc/topbar.inc.php";
            ?>
            
            <div class="container">
                <h1>Giriş Yap</h1>
                <form method="POST" action="giriskontrol.php">
                    </br>
                    <label class="lbl" for="id">Kullanıcı Adı</label></br>
                    <input type="text" id="id" class="txbox" name="id" oninput="imlecGiris()"></br>

                    <label class="lbl" for="sifre">Parola</label></br>
                    <input type="password" id="sifre" class="txbox" name="sifre" oninput="imlecGiris()"></br>

                    <div class="pg-class">
                    <input type="checkbox" id="pg" class="chkbox" onchange="sifreGoster()"><p onclick="tikla()">Parolayı göster</p></br>
                    </div>

                    <input type="submit" id="buton" class="btn pasif" name="giris" value="Giriş Yap" disabled></br>
                </form>
                    <a href="kayit.php" class="mor-yazi">Yeni hesap oluştur</a>
            </div>
        </div>

        <script src="script.js"></script>

    </body>
</html>