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
                        <a class="active-menu" href="ViewProduct.php">
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
                        <a href="ViewClients.php">
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
    <script>
       let a = null;
        function myFunction(id){
            if(a != null){
                document.getElementById(a).style.color="black";
            }
            document.getElementById(id).style.color ="red";
            document.getElementById('edit').setAttribute('value', +id);
            document.getElementById('delete').setAttribute('value', +id);
            a=id;
        }
    </script>
    <div class="container d-flex product__btn">
       <form action="AddRecordProducts.php" method="GET" class="mr-3">
        <input type="submit" name="add" value="Добавить запись" class="btn btn-success">
      </form>
        <form action="EditProduct.php" method="GET">
            <input type="submit" value="Изменить запись" id="edit" name="edit"  class="btn btn-warning">
            <div class="close__btn">
                Изменить запись
            </div>
        </form>
        <form action="DeleteProduct.php" method="GET">
            <input type="submit" value="Удалить запись" id="delete" name="delete"  class="btn btn-danger">
            <div class="close__btn-red">
                Удалить запись
            </div>
        </form> 

    </div>


     
    <?php
        $uploadir='../img/';
        $adresserver = 'localhost';
        $nameuser = 'root';
        $password = 'root';
        $namebd = 'Cosmetics';

        $link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');

        $viewId = $_GET['view_id'];
        $searchValue = $_GET['query'];

        $query = "SELECT * FROM CategoryProduct ";
        if($viewId != null){
            $query .= "WHERE ID_Category = $viewId";
        }else if($searchValue != null){
            $query .= "WHERE ProductName LIKE '%$searchValue%'";
        }

        $posts = mysqli_query($link, $query);
        $num_rows = mysqli_num_rows($posts);

        echo "<h1 class='text-center pb-3 pt-3 product__title'>Продукты</h1>";

        echo "<table class='table table__product'>";
        for($i = 0; $i < $num_rows; $i++){
            while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                echo "<tr id=".$row['ID_Product']." onclick='myFunction(".$row['ID_Product'].")'>";
                echo "<td>".$row['ID_Product']."</td>";
                echo "<td>".$row['ProductName']."</td>";
                echo "<td>".$row['ProductDescription']."</td>";
                echo "<td>".$row['PricePerOne']."</td>";
                echo "<td>".$row['CategoryName']."</td>";
                echo "<td>".$row['BrandName']."</td>";
                echo "<td>".$row['Discount']."</td>";
                echo "<td><img width='30%' class='img_table' src='$uploadir$row[Img]'></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    ?>

    <div class="container mt-5">
     <table class="categories_table">
       <tr class="categories">
           <td>
            <a href='ViewProduct.php'>Все</a>
           </td>
            <?php
              $sql = mysqli_query($link, 'SELECT ID_Category, CategoryName  FROM Category ORDER BY ID_Category;');
              while ($result = mysqli_fetch_array($sql)) {
                echo "<td>
                        <a class='pad'  href='ViewProduct.php?view_id=".$result['ID_Category']."'>".$result['CategoryName']."</a> 
                      </td>";
              }
            ?>
        </tr>
    </table>

    </div>
</div>
    </div>
<!--     <div class="container row__product">
 <form name="f1" method="GET" id="searchform" action="">
<input type="search" name="query"/>
<input type="submit" id="submit" name="submit" value="Поиск"/><!-- </br> -->
</form>     
</div> -->   
</div>  
    </div>   
</div> 

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html -->
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