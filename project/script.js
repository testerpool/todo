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
                location.reload();
            } else {
                alert("Failed to add task.");
            }
        }
    };
    xhr.send("task=" + task);
}


function toggleTaskStatus(taskId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "toggle_task_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                location.reload();
            } else {
                alert("Failed to mark task.");
            }
        }
    };
    xhr.send("id=" + taskId);
}
