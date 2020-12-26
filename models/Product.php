<?php

class Product
{

    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = $page * $count;
        
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT ID_Product, ProductName, PricePerOne, Img FROM product '
                . 'ORDER BY ID_Product DESC '                
                . 'LIMIT ' . $count
                . ' OFFSET '. $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['ID_Product'] = $row['ID_Product'];
            $productsList[$i]['ProductName'] = $row['ProductName'];
            $productsList[$i]['PricePerOne'] = $row['PricePerOne'];
            $productsList[$i]['Image'] = $row['Img'];
            $i++;
        }

        return $productsList;
    }
    
    public static function getProductsBySearch(string $search, $count = self::SHOW_BY_DEFAULT, $page = 0)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = $page * $count;
        
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT ID_Product, ProductName, PricePerOne, Img FROM product '
                . "WHERE ProductName LIKE '%" . $search . "%' "
                . 'ORDER BY ID_Product DESC '                
                . 'LIMIT ' . $count
                . ' OFFSET '. $offset
        );

        $i = 0;
        while ($row = $result->fetch()) {
            
            $productsList[$i]['ID_Product'] = $row['ID_Product'];
            $productsList[$i]['ProductName'] = $row['ProductName'];
            $productsList[$i]['PricePerOne'] = $row['PricePerOne'];
            $productsList[$i]['Image'] = $row['Img'];
            $i++;
        }

        return $productsList;
    }

    /**
     * Returns an array of products
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            
            $page = intval($page);            
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
            $db = Db::getConnection();            
            $products = array();
            $result = $db->query("SELECT ID_Product, ProductName, PricePerOne, Img FROM product "
                    . "WHERE ID_Category = '$categoryId' "
                    . "ORDER BY ID_Product ASC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT
                    . ' OFFSET '. $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['ID_Product'] = $row['ID_Product'];
                $products[$i]['ProductName'] = $row['ProductName'];
                $products[$i]['PricePerOne'] = $row['PricePerOne'];
                $products[$i]['Image'] = $row['Img'];
                $i++;
            }

            return $products;       
        }
    }
    
    
    /**
     * Returns product item by id
     * @param integer $id
     */
    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE ID_Product=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
    
    /**
     * Returns total products
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(ID_Product) AS count FROM product '
                . 'WHERE ID_Category ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    /**
     * Returns products
     */
    public static function getProdustsByIds($idsArray)
    {
        $products = array();
        
        $db = Db::getConnection();
        
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE ID_Product IN ($idsString)";

        $result = $db->query($sql);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['ID_Product'] = $row['ID_Product'];
            $products[$i]['ProductName'] = $row['ProductName'];
            $products[$i]['PricePerOne'] = $row['PricePerOne'];
            $i++;
        }

        return $products;
    }
    
    // /**
    //  * Returns an array of recommended products
    //  */
    // public static function getRecommendedProducts()
    // {
    //     $db = Db::getConnection();

    //     $productsList = array();

    //     $result = $db->query('SELECT id, name, price, image, is_new FROM product '
    //             . 'WHERE status = "1" AND is_recommended = "1"'
    //             . 'ORDER BY id DESC ');

    //     $i = 0;
    //     while ($row = $result->fetch()) {
    //         $productsList[$i]['id'] = $row['id'];
    //         $productsList[$i]['name'] = $row['name'];
    //         $productsList[$i]['image'] = $row['image'];
    //         $productsList[$i]['price'] = $row['price'];
    //         $productsList[$i]['is_new'] = $row['is_new'];
    //         $i++;
    //     }

    //     return $productsList;
    // }

}