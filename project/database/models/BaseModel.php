<?php

namespace database\models;

use database\Database;

abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Метод для вставки данных в базу данных
     *
     * @param array $data Данные для вставки
     *
     * @return bool|string Результат операции: true в случае успешной вставки, текст ошибки в случае ошибки
     */
    public function insert(array $data)
    {
        // Создаем экземпляр базы данных
        $db = $this->db;
        $table = $this->getTableName();

        // Подготавливаем данные для вставки
        $columns = implode(', ', array_keys($data));
        $values = implode("', '", array_map([$db, 'real_escape_string'], array_values($data)));

        // Формируем SQL запрос
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

        // Выполняем запрос
        if ($db->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $db->error;
        }
    }

    /**
     * Метод для удаления записи из базы данных по идентификатору
     * @param int $id Идентификатор записи для удаления
     * @return bool|string Результат операции: true в случае успешного удаления, текст ошибки в случае ошибки
     */
    public function delete(int $id)
    {
        // Получаем имя таблицы
        $table = $this->getTableName();

        // Создаем экземпляр базы данных
        $db = Database::getInstance()->getConnection();

        // Экранируем идентификатор
        $id = $db->real_escape_string($id);

        // Формируем SQL запрос
        $sql = "DELETE FROM $table WHERE id = $id";

        // Выполняем запрос
        if ($db->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $db->error;
        }
    }

    /**
     * Абстрактный метод для поиска записей
     * @param array $criteria Массив критериев поиска
     * @return array Массив найденных записей
     */
    abstract public function find(array $criteria): array;

    /**
     * Абстрактный метод имя таблицы модели
     * @return string
     */
    abstract public function getTableName(): string;
}