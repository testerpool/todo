<?php

require __DIR__ . '/vendor/autoload.php';

use database\models\Task;

// Получаем задачу из POST-запроса
$task = $_POST['task'];

// Создаем экземпляр класса Task
$taskModel = new Task();

// Вставляем задачу в базу данных
$result = $taskModel->insert(['task' => $task]);

// Выводим результат
if ($result === true) {
    echo "success";
} else {
    echo "Error: " . $result;
}
?>
