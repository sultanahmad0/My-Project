<?php
include "database.php";

if (isset($_POST['complete'])) {
    $task_id = $_POST['complete'];
    $query = "UPDATE `tasks` SET `status` = 'completed' WHERE `task_id` = '$task_id'";
    if (mysqli_query($conn, $query)) {
        echo "Task ID $task_id was completed<br>";
    } else {
        echo "Error updating task ID $task_id: ". mysqli_error($conn). "<br>";
    }
    header("Location: taskmanager.php");
    exit;
} elseif (isset($_POST['delete'])) {
    $task_id = $_POST['delete'];
    $query = "DELETE FROM `tasks` WHERE `task_id` = '$task_id'";
    mysqli_query($conn, $query);
    echo "Task ID $task_id was deleted<br>";
    header("Location: taskmanager.php");
    exit;
}

else {
    echo "No task ID was selected";
}
?>