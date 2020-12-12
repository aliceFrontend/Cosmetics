<?php
$adresserver = 'localhost';
$nameuser = 'root';
$password = 'root';
$namebd = 'Cosmetics';

$link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Could not connect');

mysqli_select_db($link, $namebd);
$ID_Product = $_GET[delete];


if(mysqli_query($link, "DELETE FROM Product
    WHERE ID_Product = ".$ID_Product.";"))
    {

    echo "<br> Запись удалена";
    echo "<script>location.replace('ViewProduct.php');</script>";
}else{
    echo '<br> Error' . mysqli_error($link);
}

mysqli_close($link);
?>