<?php

class CatalogController {

	public function actionIndex()
	{
		$q = $_POST['q'] ?? '';
		$categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getProductsBySearch($q);
        
		require_once(ROOT . '/views/catalog/index.php');

		return true;
	}

	public function actionView($id)
	{
		// if ($id) {
		// 	$catalogItem = Catalog::getCatalogItemByID($id);

		require_once(ROOT . '/views/catalog/view.php');

/*			echo 'actionView'; */
		// }

		return true;

	}
	
	public function actionCategory($categoryId, $page = 1)
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
	}
}

