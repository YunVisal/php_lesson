<?php
$file_name = "dummy_db.txt";

function readTasks($file_name)
{
    return file($file_name, FILE_IGNORE_NEW_LINES) ?: [];
}

function saveTasks($file_name, $tasks)
{
    file_put_contents($file_name, implode("\n", $tasks));
}

function addTask($file_name, $task)
{
    file_put_contents($file_name, "\n" . $task . "_progress", FILE_APPEND);
}

function deleteTask($file_name, $index)
{
    $tasks = readTasks($file_name);
    unset($tasks[$index]);
    saveTasks($file_name, $tasks);
}

function markTaskAsDone($file_name, $index)
{
    $tasks = readTasks($file_name);
    $task_name = explode("_", $tasks[$index])[0];
    $tasks[$index] = $task_name . "_done";
    saveTasks($file_name, $tasks);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"]) && !empty($_POST["task"])) {
        addTask($file_name, $_POST["task"]);
    }

    if (isset($_POST["delete"])) {
        deleteTask($file_name, $_POST["delete"]);
    }

    if (isset($_POST["check"])) {
        markTaskAsDone($file_name, $_POST["check"]);
    }
}

$tasks = readTasks($file_name);

require "index.view.php";
