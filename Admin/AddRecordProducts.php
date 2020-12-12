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
        <p>Введите Имя продукта</p>
        <input type="text" name="ProductName">
    </div>
    <div class="item">
        <p>Описание продукта</p>
        <input type="text" name="ProductDescription">
    </div>
    <div class="item">
        <p>Цена за шт</p>
        <input type="text" name="PricePerOne">
    </div>
    <div class="item">
        <p>Выберите файл</p>
        <input type="file" name = "ProductFile">
    </div>
    <div class="item">
        <p>Выберите Категорию</p>
            <?php 
            echo "<select name = 'ID_Category'>";
            $p = mysqli_query($link, "SELECT ID_Category, CategoryName FROM Category");
            $num_rows = mysqli_num_rows($p);
            for ($i=0; $i < $num_rows ; $i++) { 
                while ($row = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
                    echo "<option value = ".$row[ID_Category]."><br>".$row[CategoryName]. "</option>";
                }}
                echo "</select>";        
         ?>
    </div>
    <div class="item">
         <p>Выберите Бренд</p>
        <?php 
            echo "<select name = 'ID_Brand'>";
            $p = mysqli_query($link, "SELECT ID_Brand, BrandName FROM Brand");
            $num_rows = mysqli_num_rows($p);
            for ($i=0; $i < $num_rows ; $i++) { 
                while ($row = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
                    echo "<option value = ".$row[ID_Brand]."><br>".$row[BrandName]. "</option>";
                }}
                echo "</select>";        
         ?>
    </div>
    <div class="item">
        <p>Скидка</p>
        <input type="text" name="Discount">
    </div>    
     <input type="submit" value="Добавить" name="button">
</form>

<?php

if($_POST['button'] == 'Добавить'){
    if(mysqli_query($link, "INSERT INTO Product(Discount, ID_Brand, ID_Category, Img, PricePerOne, ProductDescription, ProductName)
        VALUES ('".$_POST['Discount']."', '".$_POST['ID_Brand']."', '".$_POST['ID_Category']."', '".$_POST['ProductFile']."', '".$_POST['PricePerOne']."', '".$_POST['ProductDescription']."','".$_POST['ProductName']."');")){

        echo "<br> Запись добавлена";
        echo "<script>location.replace('ViewProduct.php');</script>";
    }else{
        echo '<br> Error' . mysqli_error($link);
    }
}
mysqli_close($link);
?>