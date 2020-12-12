<?php 

/**
 * 
 */
class Category 
{
	
	public static function getCategoriesList()
	{
		$db = Db::getConnection();

		$categoryList = array();

		$result = $db->query('SELECT id_category, categoryname FROM category');

		$i = 0;
		while($row = $result->fetch()){
			$categoryList[$i]['id_category'] = $row['id_category'];
			$categoryList[$i]['categoryname'] = $row['categoryname']; 
			$i++;
		}
		return $categoryList;
	}
}

