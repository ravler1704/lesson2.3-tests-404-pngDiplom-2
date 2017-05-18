<html>
<head>
<title>Загруженные тесты</title>
</head>
<body>
<h1>Загруженные тесты:</h1>
<br />
<br />
<?php 
$dir    = 'uploads';
$files = scandir($dir, 1);
echo '<br />';
for ($i=0; $i<count($files)-2; $i++) {
	echo $files[$i].' (Тест №  '.$i.')<a href="test.php?numTest=' . $i . '">Выбрать тест</a><br />';
	}
?>
<br />
<br />
<br />
<a href='admin.php'>Загрузить тест</a>
</body>
</html>
