<?php
class Database {
    public static function connect() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=devengo', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }
}

