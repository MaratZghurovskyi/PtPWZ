<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$allowed = array('jpeg', 'png', 'jpg'); //перевірка на тип файлу
$ext = pathinfo($target_file, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    echo 'Error: file is not an image. ';
    $uploadOk = 0;
}
else {
    echo "File is an image. ";
    $uploadOk = 1;
} 

$filesize = $_FILES["fileToUpload"]["size"] / 1000; //перевірка розміру
if ($filesize > 2000000) { 
  echo "Sorry, your file is too large. ";
  $uploadOk = 0;
}

if (file_exists($target_file)) { //перевірка наявності
    $target_file = $target_dir . rand(0, 99) . $_FILES["fileToUpload"]["name"];
  }

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded. ";

} 
else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
    echo "The file " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. ";
    echo "File's size: " . $filesize . "KB. ";
    echo "File's extention: " . $ext . ". ";

    function make_links_clickable($text){
        return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
    }

    echo "Download your file: "; //завантажити файл по юрл
    echo make_links_clickable('http://example.local/lab2/' . $target_file);
    } 
    else 
    {
    echo "Unexpected error";
    }
}


?>