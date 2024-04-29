<?php

namespace database\models;

class Task extends BaseModel
{
    const TASK_STATUS_NEW = 'New';
    const TASK_STATUS_COMPLETED = 'Completed';

    /**
     * Метод для получения имени таблицы
     * @return string Имя таблицы
     */
    public function getTableName(): string {
        return 'task';
    }

    /**
     * Метод для поиска задач по заданным критериям
     * @param array $criteria Массив критериев поиска
     * @return array Массив найденных задач
     */
    public function find(array $criteria): array {
        $sql = "SELECT * FROM task";

        // Если массив критериев пуст, не добавляем условия WHERE
        if (!empty($criteria)) {
            $sql .= " WHERE ";

            // Генерируем условия поиска на основе переданных критериев
            $conditions = [];
            foreach ($criteria as $key => $value) {
                $conditions[] = "$key = '$value'";
            }

            // Объединяем условия с помощью оператора AND
            $sql .= implode(" AND ", $conditions);
        }

        // Выполняем запрос
        $result = $this->db->query($sql);

        // Получаем результаты
        $tasks = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }

        return $tasks;
    }

    /**
     * Метод для переключения статуса задачи
     * @param array $criteria Массив критериев поиска
     * @return bool true в случае успешного обновления, false в случае ошибки
     */
    public function toggleTaskStatus(array $criteria): bool {
        if (empty($criteria)) {
            // Если критерии не указаны, ничего не делаем
            return false;
        }

        // Используем метод find для получения текущего статуса задач
        $tasks = $this->find($criteria);
        if (empty($tasks)) {
            // Если задачи не найдены, возвращаем false
            return false;
        }

        // Предполагаем, что критерии идентифицируют одну конкретную задачу
        $currentStatus = $tasks[0]['status'];
        $newStatus = ($currentStatus === 'New') ? self::TASK_STATUS_COMPLETED : self::TASK_STATUS_NEW;

        // Генерируем условия для WHERE на основе критериев
        $conditions = [];
        foreach ($criteria as $key => $value) {
            $conditions[] = "$key = '$value'";
        }

        // Формируем SQL запрос для обновления статуса
        $sql = "UPDATE task SET status = '$newStatus'";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        // Выполняем запрос на обновление
        if ($this->db->query($sql) === true) {
            return $this->db->affected_rows > 0;
        } else {
            return false;
        }
    }
}
?>
