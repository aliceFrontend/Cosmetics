<?php
$adresserver = 'localhost';
$nameuser = 'root';
$password = 'root';
$namebd = 'Cosmetics';

$link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');
?>
<form method="POST">
    <div class="item">
        <p>Введите Имя Бренда</p>
        <input type="text" name="BrandName">
    </div>
     <input type="submit" value="Добавить" name="button">
</form>

<?php

if($_POST['button'] == 'Добавить'){
    if(mysqli_query($link, "INSERT INTO Brand(BrandName)
        VALUES ('".$_POST['BrandName']."');")){

        echo "<br> Запись добавлена";
        echo "<script>location.replace('ViewBrand.php');</script>";
    }else{
        echo '<br> Error' . mysqli_error($link);
    }
}
mysqli_close($link);
?>