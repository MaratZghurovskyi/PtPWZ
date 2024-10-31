<?php //Позначка файлу
echo "Hello World "; //Вивід строки

//Друге завдання
$ryadok = 'ryadok'; 
$int = 1234;	
$flt = 1.234;	
$bol = TRUE;

//Трєте завдання
echo " ", $ryadok, " ", $int, " ", $flt, " ", $bol, " ";
var_dump($ryadok, $int, $flt, $bol);

//Четверте завдання
$a = "uno";
$b = $a . "dos ";
echo $b;

//П'яте завдання
$four = 14;
if(($four % 2) == 0)	
{
    echo 'number is odd ';
}
else
{
    echo 'number is not odd ';
}

for($i = 1;$i <= 10; $i++)
{
    echo $i;
}
echo " ";
$rever = 10;
while ($rever > 0)
{
    echo $rever;
    $rever--;
}
echo " ";

//Шосте завдання
$student = array ('Микола', 'Парасюк', 19, 'Галузеве Машинобудування');
echo $student[0],$student[1],$student[2],$student[3];
$student[4] = 10.6;
echo " ";
echo $student[0],$student[1],$student[2],$student[3],$student[4];
?>