<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>
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

        echo "<h1 class='text-center pb-3 pt-3'>Продукты</h1>";

        echo "<table class='table'>";
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
     <div class="container d-flex">
       <form action="AddRecordProducts.php" method="GET" class="mr-3">
        <input type="submit" name="add" value="Добавить запись">
      </form>
        <form action="EditProduct.php" method="GET">
            <input type="submit" value="Изменить запись" id="edit" name="edit" class="mr-3">
        </form>
        <form action="DeleteProduct.php" method="GET">
            <input type="submit" value="Удалить запись" id="delete" name="delete"  class="mr-3">
        </form>  
    </div> 
    

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
                        <a href='ViewProduct.php?view_id=".$result['ID_Category']."'>".$result['CategoryName']."</a> 
                      </td>";
              }
            ?>
        </tr>
    </table>
    </div>
<div class="container">
 <form name="f1" method="GET" id="searchform" action="">
<input type="search" name="query"/></br>
</br>
<input type="submit" id="submit" name="submit" value="Поиск"/></br>
</form>    
</div>

<?php
    // function search ($query, $link) {$uploaddir=' ';$text = ''; $query = trim($query);
    //     $query = htmlspecialchars($query);$query = mysqli_real_escape_string($link, $query);
    //     if(!empty($query)) {if(strlen($query) < 3) {$text = '<p>короткий поисковый запрос.</p>';
    //         }elseif(strlen($query) > 128) {$text = '<p>длинный поисковый запрос.</p>';} else {
    //         $result = mysqli_query($link, "SELECT * FROM CategoryProduct WHERE ProductName LIKE '%".$query."%'");
    //         $num = mysqli_num_rows($result);    if($num > 0) {  $row = mysqli_fetch_assoc($result);
                        
    //                     $text .= '<p >По вашему запросу <strong>'.$query.'</strong>';
    //                     $text .=  ' найдено '.$num.' совпадений</p>';do {
        
    //                  $text .=  "<h3><li><a href ='ViewProduct.php?view_id= ".$row['ID_Product']."'>" . $row[ProductName] . " </a></li></h3>";                   
    //          }
    //                     while($row = mysqli_fetch_assoc($result));
                   
    //                 }else { $text = '<p>По вашему запросу ничего не найдено.</p>';  }}} else {
    //         $text = '<p>Задан пустой поисковый запрос.</p>';}echo $text."</p>";return $text;}
?>
<?php
   
   // if (!empty($_POST['query'])) { 
   //  $search_result = search ($_POST['query'],$link);} 
   //   else{
   //        $sql = mysqli_query($link, 'SELECT `ID_Product`, `PrName`,`ShortDesc`, `PricePerOne`, `CatName`, `Discount`, `Img` FROM `Filter`ORDER BY `ID_Product`;');}
      
    ?>       

    </div>
    <style>
        table{
            max-width: 80%;
        }
    </style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
