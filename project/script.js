function addTask() {
    var taskInput = document.getElementById("taskInput");
    var task = taskInput.value;
    if (task.trim() === "") {
        alert("Please enter a task.");
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_task.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                taskInput.value = "";
                fetchTasks();
            } else {
                alert("Failed to add task.");
            }
        }
    };
    xhr.send("task=" + task);
}

function fetchTasks() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_tasks.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var taskList = document.getElementById("taskList");
            taskList.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
    fetchTasks();
});
