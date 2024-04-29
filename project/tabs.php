<?php

use database\models\Task;

// Создаем экземпляр класса Task
$taskModel = new Task();

// Определяем критерии поиска (например, поиск задачи с id = 1)
$criteria = [];

// Вызываем метод find() для выполнения поиска
$tasks = $taskModel->find($criteria);
?>

<!-- Tabs navs -->

<ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="ex1-tab-1" data-mdb-tab-init="" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true" data-mdb-tab-initialized="true">All</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-2" data-mdb-tab-init="" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false" data-mdb-tab-initialized="true" tabindex="-1">Active</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-3" data-mdb-tab-init="" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false" data-mdb-tab-initialized="true" tabindex="-1">Completed</a>
    </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex1-content">
    <div class="tab-pane fade active show" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
        <ul class="list-group mb-0">
            <?php foreach($tasks as $task) : ?>
                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                    <input onclick="toggleTaskStatus(<?= $task['id'] ?>)"
                           class="form-check-input me-2" type="checkbox" value=""
                           aria-label="..."
                        <?= $task['status'] == Task::TASK_STATUS_COMPLETED ? 'checked' : '' ?>>
                    <?= $task['task'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
        <ul class="list-group mb-0">
            <?php foreach($tasks as $task) : ?>
                <?php if($task['status'] == Task::TASK_STATUS_NEW) : ?>
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                        <input onclick="toggleTaskStatus(<?= $task['id'] ?>)"
                               class="form-check-input me-2" type="checkbox" value=""
                               aria-label="..."
                            <?= $task['status'] == Task::TASK_STATUS_COMPLETED ? 'checked' : '' ?>>
                        <?= $task['task'] ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
        <ul class="list-group mb-0">
            <?php foreach($tasks as $task) : ?>
                <?php if($task['status'] == Task::TASK_STATUS_COMPLETED) : ?>
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                        <input onclick="toggleTaskStatus(<?= $task['id'] ?>)"
                               class="form-check-input me-2" type="checkbox" value=""
                               aria-label="..."
                            <?= $task['status'] == Task::TASK_STATUS_COMPLETED ? 'checked' : '' ?>>
                        <?= $task['task'] ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- Tabs content -->