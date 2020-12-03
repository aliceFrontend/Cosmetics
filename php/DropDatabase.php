<?php
$addressserver = 'localhost';
$nameuser = 'root';
$password = 'root';
$link = mysqli_connect($addressserver, $nameuser, $password)
    or die('Ошибка!');

$name = $_GET['name'];

echo 'Успешное подключение';

if(mysqli_query($link, "DROP DATABASE Cosmetics"))
{
    echo '<br> База удалена';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics\index.php");</script>';
    mysqli_close($link);
    exit;
}else{
    echo '<br>Ошибка при создании БД';
    mysqli_close($link);
}