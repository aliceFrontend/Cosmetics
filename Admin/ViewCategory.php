<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
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
    <?php
        $adresserver = 'localhost';
        $nameuser = 'root';
        $password = 'root';
        $namebd = 'Cosmetics';

        $link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');

        $posts = mysqli_query($link, "SELECT * FROM Category;");
        $num_rows = mysqli_num_rows($posts);

        echo "<div class='container pb-3 pt-3'><h1>Категории</h1></div>";
        echo "<table class='table'>";
        for($i = 0; $i < $num_rows; $i++){
            while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                echo "<tr id=".$row['ID_Category']." onclick='myFunction(".$row['ID_Category'].")'>";
                echo "<td>".$row['ID_Category']."</td>";
                echo "<td>".$row['CategoryName']."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        mysqli_close($link);
    ?>
    <div class="container d-flex" >
        <form action="AddRecordCategory.php" method="GET">
        <input type="submit" name="add" value="Добавить запись" class="mr-3">
    </form>
    <form action="EditCategory.php" method="GET" class="mr-3">
        <input type="hidden" name="add"  id="izmenenie2" value="" >
        <input type="submit" value="Изменить запись" id="izmenenie">
    </form>
    <form action="DeleteCategory.php" method="GET">
        <input type="hidden" name="add" id="udalenie2" value="">
        <input type="submit" value="Удалить запись" id="udalenie">
    </form>
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