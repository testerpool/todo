<?php

require __DIR__ . '/vendor/autoload.php';

use database\models\Task;

// Создаем экземпляр класса Task
$taskModel = new Task();

// Определяем критерии поиска (например, поиск задачи с id = 1)
$criteria = [];

// Вызываем метод find() для выполнения поиска
$tasks = $taskModel->find($criteria);

// Выводим результаты
if (!empty($tasks)) {
    foreach ($tasks as $task) {
        echo "<li>" . $task["task"] . "</li>";
    }
} else {
    echo "<li>No tasks found</li>";
}
?>