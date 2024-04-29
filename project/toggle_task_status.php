<?php

require __DIR__ . '/vendor/autoload.php';

use database\models\Task;

// Получаем задачу из POST-запроса
$taskId = $_POST['id'];

// Создаем экземпляр класса Task
$taskModel = new Task();

$result = $taskModel->toggleTaskStatus(['id' => $taskId]);

// Выводим результат
if ($result === true) {
    echo "success";
} else {
    echo "Error: " . $result;
}
?>
