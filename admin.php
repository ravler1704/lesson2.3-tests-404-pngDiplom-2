<?php
if (isset($_FILES['filename']['tmp_name'])){
	$file = $_FILES['filename']['tmp_name'];
}
if (isset($_FILES['filename']['name'])){
	$filename = $_FILES['filename']['name'];
}
if (!empty($file)) {
	ini_set('memory_limit', '32M');
	$maxsize = "100000000";
	$extentions = array( "txt", "json");
	$size = filesize ($_FILES['filename']['tmp_name']);
	$type_full = pathinfo($filename);
	$type = $type_full['extension'];
	$new_name = 'filename -'.time().'.'.$type;
	if($size > $maxsize) {
		echo "Файл больше 100 мб. Уменьшите размер вашего файла или загрузите другой. <br><a href='' onClick=window.close();>Закрыть окно</a>";
	}
	elseif(!in_array($type,$extentions)) {
		echo ' <b>Файл имеет недопустимое расширение</b>. Допустимыми являются форматы "txt" и "json". <br>';
	}
	else {
		if (copy($file, "uploads/".$filename)) {
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'list.php';
			header("location: http://$host$uri/$extra");	
			
			echo "Файл '" . $filename . "' загружен!";
			$fileIsUpload = 1;
			echo $fileIsUpload;
		}
		else echo "Файл НЕ был загружен.";
	}
}

?>

<h1>Загрузка тестов</h1>
<form action="admin.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	<input type="file" name="filename" /><br /> 
	<input type="submit" value="Загрузить" /><br />
</form>
<br />
<a href="list.php">Список тестов</a>
<br />