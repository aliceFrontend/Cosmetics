<?php
$addressserver = 'localhost';
$nameuser = 'root';
$password = 'root';
$namebd1 = 'Cosmetics';


$link = mysqli_connect($addressserver, $nameuser, $password)
    or die('Ошибка!');


    mysqli_select_db($link, $namebd1);

if(mysqli_query($link, 'CREATE TABLE Category(
    ID_Category int AUTO_INCREMENT PRIMARY KEY,
    CategoryName varchar(30) NOT NULL);'))
{
    echo '<br> Таблица создана';
   
}else{
    echo '<br>Ошибка1' . mysqli_error($link);
}

if(mysqli_query($link, 'CREATE TABLE Brand(
    ID_Brand int AUTO_INCREMENT PRIMARY KEY,
    BrandName varchar(30) NOT NULL);'))
{
    echo '<br> Таблица создана';
   
}else{
    echo '<br>Ошибка2';
}

if(mysqli_query($link, 'CREATE TABLE Product(
    ID_Product int AUTO_INCREMENT PRIMARY KEY,
    ProductName varchar(70) NOT NULL,
    ProductDescription varchar(255) NOT NULL,
    PricePerOne FLOAT NOT NULL,
    -- ID_Category int REFERENCES Category(ID_Category) ON DELETE CASCADE,
    -- ID_Brand int REFERENCES Brand(ID_Brand) ON DELETE CASCADE,
    ID_Category int,
    ID_Brand int,
    CONSTRAINT ID_Category FOREIGN KEY (ID_Category) REFERENCES Category(ID_Category)  ON DELETE CASCADE,
    CONSTRAINT ID_Brand  FOREIGN KEY (ID_Brand) REFERENCES Brand(ID_Brand)  ON DELETE CASCADE,
    Discount FLOAT DEFAULT 0,
    Img varchar(70) NOT NULL);'))
{
    echo '<br> Таблица создана';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка3' . mysqli_error($link);
}
/////////////////////////
if(mysqli_query($link, 'CREATE TABLE Clients(
    ID_Client int AUTO_INCREMENT PRIMARY KEY,
    Email varchar(70) NOT NULL UNIQUE,
    Pass varchar(30) NOT NULL,
    IsAdmin tinyint,
    Name varchar(20) NOT NULL);'))
{
    echo '<br> Таблица создана';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка3 %Clients%' . mysqli_error($link);
}

//////////////////////

if(mysqli_query($link, 'CREATE TABLE Suppliers(
    ID_Suppliers int AUTO_INCREMENT PRIMARY KEY,
    CompanyName varchar(40) NOT NULL,
    SupplierPhone varchar(20) NOT NULL,
    ContactName varchar(30),
    Fax varchar(10),
    Country varchar(20) NOT NULL,
    City varchar(20) NOT NULL,
    SupplierAddress varchar(40) NOT NULL);'))
{
    echo '<br> Таблица создана';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка3 $Suppliers$' . mysqli_error($link);
}
/////////////////////////
if(mysqli_query($link, 'CREATE TABLE Deliveries(
    ID_Delivery int AUTO_INCREMENT PRIMARY KEY,
    ID_Product int, 
    ID_Supplier int, 
    SupplierPricePerOne float NOT NULL,
    AmountDelivered int NOT NULL, DeliveryDate DATETIME NOT NULL,
    CONSTRAINT ID_Productfk FOREIGN KEY (ID_Product) REFERENCES Product(ID_Product) ON DELETE CASCADE,
    CONSTRAINT ID_Supplierfk FOREIGN KEY (ID_Supplier) REFERENCES Suppliers(ID_Suppliers) ON DELETE CASCADE
    );'))
{
    echo '<br> Таблица поставок создана';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка Deliveries' . mysqli_error($link);
}
//////////////////////////
if(mysqli_query($link, 'CREATE TABLE Orders(
    ID_Order int AUTO_INCREMENT PRIMARY KEY,
    ID_Client int,
    Products varchar(250) NOT NULL,
    CONSTRAINT ID_Clientfk FOREIGN KEY (ID_Client) REFERENCES clients(ID_Client) ON DELETE CASCADE,
OrderDate DATETIME NOT NULL DEFAULT NOW());'))
{
    echo '<br> Таблица создана';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка3 Orders' . mysqli_error($link);
}
//////////////////////////
// if(mysqli_query($link, 'CREATE TABLE Cart(
// ID_Product int REFERENCES Products(ID_Product) ON DELETE CASCADE,
// Amount int NOT NULL CHECK(Amount>0) DEFAULT(1),
// Price money NOT NULL DEFAULT(0),
// ID_Order int REFERENCES Orders(ID_Order) ON DELETE CASCADE
// CONSTRAINT PK_Cart PRIMARY KEY (ID_Product, ID_Order));'))
// {
//     echo '<br> Таблица создана';
//     echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
// }else{
//     echo '<br>Ошибка3 %Cart%' . mysqli_error($link);
// }
/////////////////////////
// if(mysqli_query($link, 'CREATE TABLE Stock(
//     CONSTRAINT PK_Cart PRIMARY KEY (ID_Product, ID_Order));'))
// {
//     echo '<br> Таблица создана';
//     echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
// }else{
//     echo '<br>Ошибка3 #Stock#' . mysqli_error($link);
// }
/////////////////////////////


   if(mysqli_query($link, "CREATE VIEW CategoryProduct AS SELECT ID_Product, 
        ProductName, 
        ProductDescription, 
        PricePerOne, Img, 
        Category.ID_Category, 
        Discount, CategoryName, 
        Brand.ID_Brand, 
        BrandName FROM (Product INNER JOIN Category ON Category.ID_Category=Product.ID_Category)
         INNER JOIN Brand ON Brand.ID_Brand= Product.ID_Brand;"))
{
    echo '<br> Представление создано';
    echo '<script>location.replace("D:\Program\Telegram Desktop\OpenServer\domains\Cosmetics");</script>';
}else{
    echo '<br>Ошибка3' . mysqli_error($link);
}


mysqli_close($link);