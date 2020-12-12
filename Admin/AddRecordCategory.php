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
        <p>Введите Имя Категория</p>
        <input type="text" name="CategoryName">
    </div>
     <input type="submit" value="Добавить" name="button">
</form>

<?php

if($_POST['button'] == 'Добавить'){
    if(mysqli_query($link, "INSERT INTO Category(CategoryName)
        VALUES ('".$_POST['CategoryName']."');")){

        echo "<br> Запись добавлена";
        echo "<script>location.replace('ViewCategory.php');</script>";
    }else{
        echo '<br> Error' . mysqli_error($link);
    }
}
mysqli_close($link);
?>