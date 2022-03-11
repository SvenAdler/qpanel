<?php

namespace app\system;

use PDO;
use PDOException;

// singleton DB
class DB
{
    protected static ?PDO $connection;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getConnection(): PDO|null
    {
        if (!isset(self::$connection)) {
            $db_info = array(
                "db_host" => "localhost",
                "db_username" => "root",
                "db_password" => "",
                "db_name" => "qpanel",
                "db_charset" => "utf8mb4"
            );

            try {
                self::$connection = new PDO("mysql:host=" . $db_info['db_host'] . ';dbname=' . $db_info['db_name'], $db_info['db_username'], $db_info['db_password']);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->query('SET NAMES utf8mb4');
                self::$connection->query('SET CHARACTER SET utf8mb4');
                self::setCharsetEncoding();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$connection;
    }

    public static function setCharsetEncoding(): void
    {
        if (self::$connection == null) {
            self::getConnection();
        }

        self::$connection->exec(
            "SET NAMES 'utf8mb4';
			SET character_set_connection=utf8mb4;
			SET character_set_client=utf8mb4;
			SET character_set_results=utf8mb4"
        );
    }
}