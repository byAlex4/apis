<?php

require_once './config.php';

class mainModel
{
    public static function connect()
    {
        $conn = new PDO(SGBD, USER, PASS, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET CHARACTER SET utf8");
        return $conn;
    }
}
?>