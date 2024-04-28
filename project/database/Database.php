<?php

namespace database;

use mysqli;
class Database
{
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Инициализация подключения к базе данных
        $this->connection = new mysqli('mysql_db_container', 'todo_user', 'todo_password', 'todo_list');

        // Проверка на ошибки подключения
        if($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
    // Другие методы для выполнения запросов к базе данных
}

?>
