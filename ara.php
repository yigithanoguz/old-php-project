<?php
session_start();
$ara = true;
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Arama Yap</title>
</head>
<body>
    
    <?php
        include "inc/topbar.inc.php";
    ?>

    <div class="container">
        <h1>Arama Yap</h1>
        <form style="margin: 20px;" action="arakontrol.php" method="GET" id="arakontrol">
            <label class="lbl" for="ara">Arayacağınız ifadeyi giriniz:</label>
            <input type="text" id="ara" class="txbox" name="ifade"><br>
            <input type="submit" value="Arama Yap" class="btn aktif">
        </form>
    </div>
</body>
</html>