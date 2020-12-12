<?php 
$adresserver = 'localhost';
$username = 'root';
$password = 'root';
$link = mysqli_connect($adresserver, $username, $password) or die ('Ошибка'.mysql_error($link));
echo 'Вы успешно подключились к серверу';
if(mysqli_query($link, "CREATE DATABASE Cosmetics")){
	echo '<br>База данных создана';
	echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
	exit;
}
else {
	echo '<br>Ошибка при создании  ' .mysqli_error($link);}
mysqli_close($link);
 ?>

