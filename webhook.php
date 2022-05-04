<?php 
$fWrite = fopen("log.txt","a");
$wrote = fwrite($fWrite, var_dump($_POST));
fclose($fWrite);
?>
