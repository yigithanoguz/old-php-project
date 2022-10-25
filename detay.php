<?php
session_start();

include "inc/fonksiyonlar.inc.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Detaylı İncele</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        
        <div class="mid">
            <?php
                include "inc/topbar.inc.php";
            ?>

            <div class="icerik mid">

                <?php
                    include "inc/vtbaglan.inc.php";

                    $sql ="select post.*, uye.id from post inner join uye on post.sahip = uye.kod and post.kod = :kod";
                    $ifade = $vt->prepare($sql);
                    $ifade->execute(Array(":kod"=>$_GET["kod"]));
                    $kayit = $ifade->fetch(PDO::FETCH_ASSOC);
                    
                        $id = $kayit["kod"]; // her gönderiye id veriyoruz (header fonk. için)
                        echo '<div class="gonderi" id="';
                        echo $id;
                        echo '">';
                        echo '<h1 class="sol ust">';
                        echo htmlentities($kayit["id"]);
                        echo '</h1>';
                        echo '<video controls="controls">';
                        echo '<source src="';
                        echo $kayit["dosya"];
                        echo '" type="video/mp4" />';
                        echo 'Tarayıcınız video etiketini desteklemiyor.';
                        echo '</video>';
                        echo '<br>';
                        echo '<div class="yatay">';
                        
                        if(isset($_SESSION["yetki"]) and $_SESSION["yetki"] == true){ // Eğer yetki var ise gösterilecek butonlar

                            $sql2 ="select count(*) as sayi from begeni where uyeKod = :uyeKod and postKod = :postKod";
                            $ifade2 = $vt->prepare($sql2);
                            $ifade2->execute(Array("postKod"=>$kayit["kod"], "uyeKod"=>$_SESSION["kod"]));

                            $kayit2 = $ifade2->fetch(PDO::FETCH_ASSOC);

                            if($kayit2["sayi"] == 1){ // daha önce beğenildiyse
                                ?>
                                <form action="begenmektenvazgec.php" method="POST">
                                    <input type="hidden" name="kod" value="<?php echo $kayit["kod"]; ?>">
                                    <input type="image" src="img/kalp.png" name="formdangelen" class="sol like" width="40px">
                                </form>
                                <?php
                            }
                            else{ // daha önce beğenilmediyse
                                ?>
                                <form action="begen.php" method="POST">
                                    <input type="hidden" name="kod" value="<?php echo $kayit["kod"]; ?>">
                                    <input type="image" src="img/kalp.png" name="formdangelen" class="sol nolike" width="40px">
                                </form>

                                <?php
                            }
                            echo '<form method="POST" action="yorumyap.php?kod=';
                                echo $kayit["kod"];
                                echo '">';
                                echo '<input type="hidden" name="kod" value="';
                                echo $kayit["kod"];
                                echo '">';
                                echo '<input type="submit" name="formdangelen" value="Yorum Yap" class="sol ybtn oval">';
                            echo '</form>';

                            if (isset($_SESSION["kod"]) and ($_SESSION["kod"] == $kayit["sahip"])) { // SESSION giriş yapan bilgisi, kayit, ilanı veren kişi
                                ?>
                                <form action="duzenle.php" method="POST">
                                  <input type="hidden" name="kod" value="<?php echo $kayit["kod"]; ?>">
                                  <input type="submit" name="formdangelen" value="Düzenle" class="sol ybtn oval">
                                </form>
            
                                <form action="sil.php" method="POST">
                                <input type="hidden" name="kod" value="<?php echo $kayit["kod"]; ?>">
                                <input type="submit" name="formdangelen" value="Sil" class="sol ybtn oval">
                                </form>
                                <?php
                            }
                        }
                        
                        echo '</div>';
                        if($kayit["aciklama"]!=NULL){ // eğer açıklama boş değilse yazdır
                            echo '<hr class="ince ust">';
                            echo '<div class="dikey">';
                            echo '<h2 class="sol ust">';
                            echo 'Açıklama Sahibi: ';
                            echo htmlentities($kayit["id"]);
                            echo '</h2>';
                            echo '<p class="sol ust">';
                            echo htmlentities($kayit["aciklama"]);
                            echo '</p>';

                            echo '<p style="text-align: right;" class="sol ust">';
                            echo 'Yüklenme Zamanı: ';
                            echo htmlentities($kayit["zaman"]);
                            echo '</p>';

                            echo '</div>';
                            
                        }

                        // Veri tabanına bağlanalım...
                        include "inc/vtbaglan.inc.php";

                        $sql ="select yorum.*, uye.id from yorum inner join uye on uye.kod = yorum.uyeKod and yorum.postKod = :postKod order by zaman asc";
                        $ifade = $vt->prepare($sql);
                        $ifade->execute(Array("postKod"=>$kayit["kod"]));

                        while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
                            echo '<hr class="ince ust">';
                            echo '<div class="dikey">';
                            echo '<h2 class="sol ust">';
                            echo htmlentities($kayit["id"]);
                            echo '</h2>';
                            echo '<p class="sol ust">';
                            echo htmlentities($kayit["metin"]);
                            echo '</p>';

                            echo '<p style="text-align: right;" class="sol ust">';
                            echo htmlentities($kayit["zaman"]);
                            echo '</p>';

                            echo '</div>';
                            
                        }
                        $vt = null;

                        echo '</div>';
                        echo '<hr class="cizgi">';
                    
                    $vt = null;
                ?>

            </div>
        </div>
    </body>
</html>