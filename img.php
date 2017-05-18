<?php
header('Content-Type: image/png');
// Создание изображения
$im = imagecreatetruecolor(400, 30);
// Создание цветов
$white = imagecolorallocate($im, 255, 0, 0);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);
//Cчитать имя пользователя и оценку из файла json созданного в test.php
$file = file_get_contents ('src/people.txt');
$jsonDecode =(json_decode($file, true));
// Текст надписи
$text = 'Имя: '.$jsonDecode["a"].'. Верных ответов: '.$jsonDecode["b"];
// Замена пути к шрифту на пользовательский
$font = 'fonts/arial.ttf';
// Тень
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
// Текст
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

imagepng($im);
imagedestroy($im);
