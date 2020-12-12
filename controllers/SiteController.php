<?php

class SiteController
{
	 

    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(1);

        // Список товаров для слайдера
        // $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }


     public static function getCategoriesList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT ID_Category, categoryname FROM category');

        // Получение и возврат результатов
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['ID_Category'] = $row['id'];
            $categoryList[$i]['CategoryName'] = $row['categoryname'];
            $i++;
        }
        return $categoryList;
    }
}