 <?php
        $adresserver = 'localhost';
        $nameuser = 'root';
        $password = 'root';
        $namebd = 'Cosmetics';

        $link = mysqli_connect($adressserver, $nameuser, $password) or die('Ошибка: ' . mysqli_error($link));
        mysqli_select_db($link, $namebd) or die('Couldnot connect');

        $posts = mysqli_query($link, "SELECT * FROM Brand;");
        $num_rows = mysqli_num_rows($posts);

        echo "<table class='table pt-5'>";
        for($i = 0; $i < $num_rows; $i++){
            while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                echo "<tr id=".$row['ID_Category']." onclick='myFunction(".$row['ID_Category'].")'>";
                echo "<td>".$row['ID_Brand']."</td>";
                echo "<td>".$row['BrandName']."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        mysqli_close($link);
    ?>