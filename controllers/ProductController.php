<?php
//подключение моделей
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class ProductController
{
//просмотр конкретного продукта по айди
    public function actionView($productId)
    {
//создаем масив из категорий
        $categories = array();
        //получаем список категорий из метода getCategoriesList, модели Category
        $categories = Category::getCategoriesList();
        //получаем конкретный продукт с помошью метода getProductById, модели Product
        $product = Product::getProductById($productId);
        //рисуем страницу товара
        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}
