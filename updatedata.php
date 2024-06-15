<?php
include "database.php";
if(isset($_POST)){

    $task_name = $_POST['task_name'];
    $task_desc = $_POST['task_desc'];
    $add_notes = $_POST['add_notes'];
    $priority = $_POST['priority'];
    $datetime = $_POST['datetime'];
}
$task_id = $_GET['task_id'];

$update_query = "UPDATE `tasks` SET 
                    `task_name` = '$task_name', 
                    `task_desc` = '$task_desc', 
                    `task_notes` = '$add_notes', 
                    `priority` = '$priority', 
                    `datetime` = '$datetime' 
                WHERE `task_id` = '$task_id'";

if (mysqli_query($conn, $update_query)) {
    header("location:taskmanager.php");
    exit;
} else {
    echo "Error updating task: " . mysqli_error($conn);
}
?>