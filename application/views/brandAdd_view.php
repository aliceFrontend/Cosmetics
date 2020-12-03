<div class="container">
	<h1 style = "margin-bottom: 30px;">Brand</h1>

    <?php 
        include 'php/ViewBrand.php';
     ?>

    <form method="POST">
        <div class="item">
            <p>Введите Имя Бренда</p>
            <input type="text" name="BrandName" class="form-control" style = "width: auto;">
        </div>
        <br>
         <input type="submit" value="Добавить" name="button"  class="btn btn-primary">     

    </form>

<?php 
    include "php/AddBrand.php";
 ?>

</div>