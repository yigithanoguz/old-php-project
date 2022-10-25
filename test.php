<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Anasayfa</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        
        <div class="mid">
            <?php
                include "topbar.inc.php";
            ?>

            <div class="icerik mid">

                <div class="gonderi">
                    <h1 class="sol ust">yigithanoguz</h1>
                    <video controls="controls">
                        <source src="yuklenenler/yiğithan her şeyi yak cover.mp4" type="video/mp4" />
                        Tarayıcınız video etiketini desteklemiyor.
                    </video>
                    <br>
                    <div class="yatay">
                        <input type="image" src="img/kalp.png" class="sol nolike" value="submit" width="40px">
                        <input type="submit" value="Yorum Yap" class="sol20 ybtn oval">
                        <input type="submit" value="Yorumları Göster" class="sol20 ybtn oval">
                    </div>
                    <div class="yatay">
                        <h2 class="sol ust">yigithanoguz</h2>
                        <p class="sol ust">her şeyi yak çaldım beğenirsiniz</p>
                    </div>
                </div>
                <hr class="cizgi">

                <?php /*
                    include "vtbaglan.inc.php";

                    $sql ="select post.*, uye.id from post inner join uye on post.sahip = uye.kod";
                    $ifade = $vt->prepare($sql);
                    $ifade->execute();

                    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="gonderi">';
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
                        echo '<input type="image" src="img/kalp.png" class="sol nolike" value="submit" width="40px">';
                        echo '<input type="submit" value="Yorum Yap" class="sol20 ybtn oval">';
                        echo '<input type="submit" value="Yorumları Göster" class="sol20 ybtn oval">';
                        echo '</div>';
                        if($kayit["aciklama"]!=NULL){ // eğer açıklama boş değilse yazdır
                            echo '<div class="yatay">';
                            echo '<h2 class="sol ust">';
                            echo htmlentities($kayit["id"]);
                            echo '</h2>';
                            echo '<p class="sol ust">';
                            echo htmlentities($kayit["aciklama"]);
                            echo '</p>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '<hr class="cizgi">';
                    }
                    
                    $vt = null;
                    */ ?>

            </div>
        </div>
    </body>
</html>