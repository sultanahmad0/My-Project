<?php
include "database.php";
session_start();
$email = $_SESSION['email'];
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $task_name = $_POST['task_name'];
        $task_desc = $_POST['task_desc'];
        $add_notes = $_POST['add_notes'];
        $priority = $_POST['priority'];
        $date = $_POST['datetime'];
        
        $sql = "INSERT INTO `tasks` (`email`, `task_id`, `task_name`, `task_desc`, `task_notes`, `priority`, `datetime`, `current_datetime`,`status`) VALUES ('$email', NULL, '$task_name', '$task_desc', '$add_notes', '$priority', '$date', current_timestamp(),'pending')";
        $result = mysqli_query($conn,$sql);
        header("location:addtask.php");
        exit;
        
    }
?>