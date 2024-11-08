<?php
$arrFiles = array();
$dirPath = "./uploads";

function make_links_clickable($text){
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
}

$files = scandir($dirPath);
foreach ($files as $file) {
    $filePath = $dirPath . '/' . $file;
    if (is_file($filePath)) {
        echo make_links_clickable('http://example.local/lab2/uploads/' . $file . "<br>");
    }
}
?>