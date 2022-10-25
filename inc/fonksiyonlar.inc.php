<?php
function git($mesaj, $adres) {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('$mesaj');
    window.location.href='$adres';
    </script>");
    exit;
}
?>
