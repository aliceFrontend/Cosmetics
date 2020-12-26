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
                        <a href="ViewProduct.php">
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
                        <a class="active-menu" href="ViewSuppliers.php">
                            <i class="fa fa-table"></i>
                            Suppliers
                        </a>
                    </li>
                </ul>
        </nav>
        <script>
    
        let a = null;
        function myFunction(id){
            if(a != null){
                document.getElementById(a).style.color="black";
            }
            document.getElementById(id).style.color ="red";

            document.getElementById('izmenenie').setAttribute('value', `Изменить запись ${+id}`);
            document.getElementById('udalenie').setAttribute('value', `Удалить запись ${+id}`);

            document.getElementById('izmenenie2').setAttribute('value', +id);
            document.getElementById('udalenie2').setAttribute('value', +id);
            a=id;
        }
    </script>
        <div id="page-wrapper"> 
            <div id="page-inner">
                <div class="container">
                            <div class="container brand__btn">
                              <form action="AddRecordBrand.php" method="GET" class="mr-3">
                                    <input type="submit" name="add" value="Добавить запись" class="btn btn-success">
                                </form>
                                <form action="EditBrand.php" method="GET" class="mr-3">
                                    <input type="submit" name="edit" value="Изменить запись" class="btn btn-warning">
                                </form>
                                <form action="DeleteBrand.php" method="GET" class="mr-3">
                                     <input type="submit" name="delete" value="Удалить запись" class="btn btn-danger">
                                </form>  
                            </div>
                        </div>
                     <div class="container">
                        <?php
                        $adresserver = 'localhost';
                        $nameuser = 'root';
                        $password = 'root';
                        $namebd = 'Cosmetics';

                        $link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
                        mysqli_select_db($link, $namebd) or die('Couldnot connect');

                        $posts = mysqli_query($link, "SELECT * FROM suppliers;");
                        $num_rows = mysqli_num_rows($posts);

                        echo "<div class='container pb-5 pt-5'>
                                 <h1 class='brand__title'>Поставщики</h1>
                             </div>";
                        echo "<table class='table brand__table'>";

                        for($i = 0; $i < $num_rows; $i++){
                            while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                                
                                echo "<tr id=".$row['ID_Suppliers']." onclick='myFunction(".$row['ID_Suppliers'].")'>";
                                echo "<td>".$row['CompanyName']."</td>";
                                echo "<td>".$row['SupplierPhone']."</td>";
                                echo "<td>".$row['ContactName']."</td>";
                                echo "<td>".$row['Fax']."</td>";
                                echo "<td>".$row['Country']."</td>";
                                echo "<td>".$row['City']."</td>";
                                 echo "<td>".$row['SupplierAddress']."</td>";
                                echo "</tr>";
                            }
                        }
                        echo "</table>";
                        mysqli_close($link);
                         ?>
                        <!-- конец -->
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
