<?php

namespace database\migration;

use database\Database;

/**
 * Миграция для создания таблицы `tasks`
 */
class CreateTaskTable
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function up()
    {
        $tableName = 'task';

        // Проверяем существование таблицы
        $checkSql = "SHOW TABLES LIKE '$tableName'";
        $result = $this->db->query($checkSql);
        if ($result->num_rows > 0) {
            echo "Table '$tableName' already exists";
        } else {
            // Таблица не существует, создаем её
            $sql = "
        CREATE TABLE $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(255) NOT NULL,
            status ENUM('New', 'Completed') NOT NULL DEFAULT 'New',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

            if ($this->db->query($sql) === TRUE) {
                echo "Table '$tableName' created successfully";
            } else {
                echo "Error creating table: " . $this->db->error;
            }
        }
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS task";

        if ($this->db->query($sql) === TRUE) {
            echo "Table 'task' dropped successfully";
        } else {
            echo "Error dropping table: " . $this->db->error;
        }
    }
}
