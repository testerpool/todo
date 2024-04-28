<?php

namespace database\models;

class Task extends BaseModel
{
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
}
?>
