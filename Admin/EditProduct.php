<?php
$adresserver = 'localhost';
$nameuser = 'root';
$password = 'root';
$namebd = 'Cosmetics';

$link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');

mysqli_select_db($link, $namebd);
$ID_Product = $_GET['edit'];
// $posts = mysqli_query($link, "SELECT * FROM Product WHERE ID_Product ='$ID_Product'");
// $row = mysqli_fetch_array($posts, MYSQLI_ASSOC);

// 
$posts = mysqli_query($link, 
    "SELECT * FROM Product WHERE ID_Product=".$_GET[edit].";");
while ($row = mysqli_fetch_array($posts, MYSQLI_ASSOC))  { ?>
<form method="POST">
    <div class="item">
         <input type="text" name="ID_Product" value="<?php echo $row[ID_Product]?>">
    </div>
    <div class="item">
        <p>Введите Имя продукта</p>
        <input type="text" name="ProductName" value="<?php echo $row[ProductName]?>">
    </div>
    <div class="item">
        <p>Описание продукта</p>
        <input type="text" name="ProductDescription" value="<?php echo $row[ProductDescription] ?>">
    </div>
    <div class="item">
        <p>Цена за шт</p>
        <input type="text" name="PricePerOne" value="<?php echo $row[PricePerOne] ?>">
    </div>
    <div class="item">
        <p>Выберите файл</p>
        <input type="file" name = "ProductFile" value="<?php echo $row[ProductFile] ?>">
    </div>
    <div class="item">
        <p>Выберите Категорию</p>
            <?php 
            echo "<select name = 'ID_Category'>";
            $p = mysqli_query($link, "SELECT ID_Category, CategoryName FROM Category");
            $num_rows = mysqli_num_rows($p);
            for ($i=0; $i < $num_rows ; $i++) { 
                while ($er = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
                    echo "<option value = ".$er[ID_Category]."><br>".$er[CategoryName]. "</option>";
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
                while ($er = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
                    echo "<option value = ".$er[ID_Brand]."><br>".$er[BrandName]. "</option>";
                }}
                echo "</select>";        
         ?>
    </div>
    <div class="item">
        <p>Скидка</p>
        <input type="text" name="Discount" value="<?php echo $row[Discount] ?>">
    </div>    
     <input type="submit" value="Изменить" name="button">
</form>

<?php
}
if($_POST['button'] == 'Изменить'){
    if(mysqli_query($link, "UPDATE Product SET Discount = '".$_POST['Discount']."', ID_Brand = '".$_POST['ID_Brand']."', ID_Category = '".$_POST['ID_Category']."', PricePerOne = '".$_POST['PricePerOne']."', ProductDescription =  '".$_POST['ProductDescription']."', ProductName = '".$_POST['ProductName']."'
        WHERE ID_Product=".$_POST['ID_Product'].";")){

        echo "<br> Запись изменена";
        echo "<script>location.replace('ViewProduct.php');</script>";
    }else{
        echo '<br> Error' . mysqli_error($link);
    }
}
mysqli_close($link);
?>