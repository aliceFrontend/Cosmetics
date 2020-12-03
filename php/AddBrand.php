<?php
$adresserver = 'localhost';
        $nameuser = 'root';
        $password = 'root';
        $namebd = 'Cosmetics';

        $link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');

if($_POST['button'] == 'Добавить'){
    
    if(mysqli_query($link, "INSERT INTO Brand(BrandName)
        VALUES ('".$_POST['BrandName']."');")){

    }else{
        echo '<br> Error' . mysqli_error($link);
    }
    echo("<meta http-equiv='refresh' content='1'>"); 
}
mysqli_close($link);
?>