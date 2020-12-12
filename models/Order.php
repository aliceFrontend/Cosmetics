<?php

class Order
{

    /**
     * Сохранение заказа 
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userId, $products)
    {
        //$products = json_encode($products);

        $db = Db::getConnection();

        $sql = 'INSERT INTO orders (ID_Client, Products) '
                . 'VALUES (:user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products['ProductName'], PDO::PARAM_STR);

        return $result->execute();
    }

}
