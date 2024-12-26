<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'devengo';


    $db = new PDO('mysql:host='. $db_host .'; dbname='. $db_name, $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, value: false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, value: true);

define('APP_NAME', 'Paciente');

