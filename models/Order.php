<?php

class Order
{

    /**
     * Сохранение заказа 
     * @return type
     */
    public static function save($userId, $products)
    {
        //$products = json_encode($products);

        $prodString = Cart::getProducts();
        $prodString = print_r($prodString, true);
        $db = Db::getConnection();

        $sql = 'INSERT INTO orders (ID_Client, Products) '
        . 'VALUES (:user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $prodString, PDO::PARAM_STR);

        return $result->execute();
    }

}
