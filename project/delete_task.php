<?php

require __DIR__ . '/vendor/autoload.php';

use database\models\Task;

// Проверяем, передан ли идентификатор задачи для удаления
if (!isset($_POST['task_id'])) {
    echo "Task ID is missing";
    exit;
}

// Получаем идентификатор задачи из POST-запроса
$taskId = $_POST['task_id'];

// Создаем экземпляр класса Task
$taskModel = new Task();

// Удаляем задачу из базы данных
$result = $taskModel->delete($taskId);

// Выводим результат
if ($result === true) {
    echo "success";
} else {
    echo "Error: " . $result;
}
?>
