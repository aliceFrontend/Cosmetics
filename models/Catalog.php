<?php


class News
{

  /** Returns single news items with specified id
  * @rapam integer &id
  */

  public static function getCatalogItemByID($id)
  {
    $id = intval($id);

    if ($id) {
      $host = 'localhost';
      $dbname = 'php_base';
      $user = 'root';
      $password = 'root';
      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $db = Db::getConnection();
      $result = $db->query('SELECT * FROM news WHERE id=' . $id);

      /*$result->setFetchMode(PDO::FETCH_NUM);*/
      $result->setFetchMode(PDO::FETCH_ASSOC);

      $CatalogItem = $result->fetch();

      return $CatalogItem;
    }

  }

  /**
  * Returns an array of news items
  */
  public static function getCatalogList() {
    $host = 'localhost';
    $dbname = 'php_base';
    $user = 'root';
    $password = 'root';
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $db = Db::getConnection();
    $catalogList = array();

    $result = $db->query('SELECT id, title, date, author_name, short_content FROM news ORDER BY id ASC LIMIT 10');

    $i = 0;
    while($row = $result->fetch()) {
      $newsList[$i]['id'] = $row['id'];
      $newsList[$i]['title'] = $row['title'];
      $newsList[$i]['date'] = $row['date'];
      $newsList[$i]['author_name'] = $row['author_name'];
      $newsList[$i]['short_content'] = $row['short_content'];
      $i++;
    }

    return $newsList;
  
}

}