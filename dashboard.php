<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="main">
        <div>
            <?php include "sidebar.php";
            if(!isset($_SESSION['email'])){
                header("location:logoutshow.php");
            }
            ?>
        </div>
        <div class="dashboard">
            <div class="heading">
                <img src="./assets/chart-pie-solid.svg" alt="">
                <h1>Dashboard</h1>
            </div>
            <div class="dashboardnav">
                <?php include "dashboard-analytics.php" ?>
                <div class="nav2">
                    <a href="addtask.php" class="add-task center">
                        <img src="assets/circle-plus-solid.svg" alt="">
                        <h3 style="color: #3649df;">Create Task</h3>
                    </a>
                    <a href="#" class="add-task" onclick="sendPostRequest('status','pending')">
                        <h3>Pending</h3>
                        <div><img src="assets/clock-regular.svg" alt=""><h1 style="color: #f52424;"><?php include "dashboard-analytics.php";echo $num_pending;?></h1></div>
                    </a>
                    <a href="#" class="add-task" onclick="sendPostRequest('status','completed')">
                        <h3>Done</h3>
                        <div><img src="assets/circle-check-regular.svg" alt=""><h1 style="color: #1ef62c;"><?php echo $num_completed;?></h1></div>
                    </a>
                </div>
            </div>
            <div class="dashboardnav">
                <?php include "dashboard-analytics.php" ?>
                <div class="nav2">
                    <a href="taskmanager.php" class="add-task" >
                        <h3>Total Tasks</h3>
                        <div><img src="assets/check-double-solid.svg" alt=""><h1 style="color: #3649df;"><?php include "dashboard-analytics.php";echo $num_pending + $num_completed;?></h1></div>
                    </a>
                    <a href="search.php" class="add-task center">
                        <img src="assets/magnifying-glass-solid.svg" alt="">
                        <h3>Search Here</h3>
                    </a>
                    <a href="taskmanager.php" class="add-task center">
                        <img src="assets/chart-line-solid.svg" alt="">
                        <h3>Manage Your Tasks</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form id="post-form" action="search.php" method="post">
    <input type="hidden" name="prio" id="prio">
    <input type="hidden" name="search" id="search">
</form>

<script>
    function sendPostRequest(status,pending) {
        document.getElementById('prio').value = status;
        document.getElementById('search').value = pending;
        document.getElementById('post-form').submit();
    }
</script>
</body>

</html>