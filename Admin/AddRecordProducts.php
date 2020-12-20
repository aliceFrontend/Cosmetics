<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/custom-styles.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <title>administration</title>
</head>
<body>
     <div class="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand header__logo" href="#">
                    <img src="../template/images/icon/logo-fox.svg" alt="">
                    <strong>Cosmetics</strong>
                </a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="/">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="ViewBrand.php">
                            <i class="fa fa-table"></i>
                            Brand
                        </a>
                    </li>
                    <li>
                        <a href="ViewCategory.php">
                            <i class="fa fa-table"></i>
                            Category
                        </a>
                    </li>
                    <li>
                        <a href="ViewProduct.php" class="active-menu">
                            <i class="fa fa-table"></i>
                            Product
                        </a>
                    </li>
                    <li>
                        <a href="ViewOrders.php">
                            <i class="fa fa-table"></i>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="ViewClints.php">
                            <i class="fa fa-table"></i>
                            Clients
                        </a>
                    </li>
                    <li>
                        <a href="ViewDeliveries.php">
                            <i class="fa fa-table"></i>
                            Deliveries
                        </a>
                    </li>
                    <li>
                        <a href="ViewSuppliers.php">
                            <i class="fa fa-table"></i>
                            Suppliers
                        </a>
                    </li>
                </ul>
        </nav>
        <div id="page-wrapper"> 
            <div id="page-inner">
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
     <input type="submit" value="Добавить" name="button" class="product__add">
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
</div>
    </div>
         <footer>
                            <p>All right reserved. Template by:
                                <a href="http://webthemez.com">WebThemez</a>
                            </p>
                </footer>
               </div>
            </div>
        </div>
<script src="../template/js/admin/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/custom-scripts.js"></script>    
</body>
</html>