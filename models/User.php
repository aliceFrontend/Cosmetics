<?php

class User
{

    /**
     * Регистрация пользователя 
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function register($name, $email, $password)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO clients (Name, Email, Pass) '
                . 'VALUES (:Name, :Email, :Pass)';

        $result = $db->prepare($sql);
        $result->bindParam(':Name', $name, PDO::PARAM_STR);
        $result->bindParam(':Email', $email, PDO::PARAM_STR);
        $result->bindParam(':Pass', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Редактирование данных пользователя
     * @param string $name
     * @param string $password
     */
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE clients 
            SET Name = :Name, Pass = :Pass 
            WHERE ID_Client = :ID_Client";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':ID_Client', $id, PDO::PARAM_INT);       
        $result->bindParam(':Name', $name, PDO::PARAM_STR);    
        $result->bindParam(':Pass', $password, PDO::PARAM_STR); 
        return $result->execute();
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email
     * @param string $password
     * @return mixed : ingeger user id or false
     */
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM clients WHERE Email = :Email AND Pass = :Pass';

        $result = $db->prepare($sql);
        $result->bindParam(':Email', $email, PDO::PARAM_INT);
        $result->bindParam(':Pass', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['ID_Client'];
        }

        return false;
    }

    /**
     * Запоминаем пользователя
     * @param string $email
     * @param string $password
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function isAdmin()
    {
        
        if(isset($_SESSION['user'])){
            $id = $_SESSION['user'];
            $db = Db::getConnection();

            $sql = 'SELECT * FROM clients WHERE ID_Client = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();

            $user = $result->fetch();
            if ($user) {
            return $user['IsAdmin'];
        }
            return 0;
        }
        
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM clients WHERE Email = :Email';

        $result = $db->prepare($sql);
        $result->bindParam(':Email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Returns user by id
     * @param integer $id
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM clients WHERE ID_Client = :ID_Client';

            $result = $db->prepare($sql);
            $result->bindParam(':ID_Client', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

}
