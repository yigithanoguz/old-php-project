<div class="top-bar">
    <div>
    <?php
        if(isset($anasayfa))
        {
            echo '<a href="index.php" class="top-btn sayfa">Anasayfa</a>';
        }
        else{
            echo '<a href="index.php" class="top-btn">Anasayfa</a>';
        }
    ?>
    </div>
    <div>
        <?php 
            if(isset($ara)){ // eğer ara.php ise
                echo '<a href="ara.php" class="top-btn sayfa">Ara</a>';
            }
            else{
                echo '<a href="ara.php" class="top-btn">Ara</a>';
            }

            if (isset($_SESSION["yetki"]) and $_SESSION["yetki"] == true) { // yetki var ise (oturum var ise)
                if(isset($yukle)){ // eğer yükle.php ise
                    echo '<a href="yukle.php" class="top-btn sayfa">Paylaş</a>';
                }
                else{
                    echo '<a href="yukle.php" class="top-btn">Paylaş</a>';
                }
                if(isset($profil)){
                    echo "<a href='profil.php' class='top-btn sayfa'>";
                    echo htmlentities($_SESSION["id"]);
                    echo "</a>";
                }
                else{
                    echo "<a href='profil.php' class='top-btn'>";
                    echo htmlentities($_SESSION["id"]);
                    echo "</a>";
                }
                
                echo '<a href="cikis.php" class="top-btn">Çıkış Yap</a>';
            }
            else {
        
                if(isset($giris)){
                    echo '<a href="giris.php" class="top-btn sayfa">Giriş Yap</a>';
                }
                else{
                    echo '<a href="giris.php" class="top-btn">Giriş Yap</a>';
                }

                if(isset($kayitol)){
                    echo '<a href="kayit.php" class="top-btn sayfa">Kayıt Ol</a>';
                }
                else{
                    echo '<a href="kayit.php" class="top-btn">Kayıt Ol</a>';
                }
            
            
        
            }
        ?>
    </div>
</div>