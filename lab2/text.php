<?php
$txt = $_POST['text'];

$myfile = fopen("log.txt", "w");
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("log.txt", "r");
echo fread($myfile,filesize("log.txt"));
fclose($myfile);
?>