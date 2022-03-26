<?php

class DB
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);

        $conn = new PDO("mysql:host={$params['servername']};dbname={$params['dbname']}", $params['dbuser'], $params['password']);

        return $conn;
    }
}

?>