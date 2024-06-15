<?php
session_start();
if(!isset($_SESSION['username'])){
    header("loacation:logoutshow.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="taskmanager_and_search.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Task Manager</title>
</head>
<style>
    #taskmanager{
        background-color: #fff
    }
</style>
<body>
    <div class="main">
        <div>
            <?php include "sidebar.php"?>
        </div>


        <div class="dashboard">
            <div class="headingtask"><img src="assets/chart-line-solid.svg" alt="">
                <h1>TASK MANAGER</h1>
            </div>
            <div class="mangercontent">
                <div class="managernav">
                    
                    <form action="search.php" method="post">
                    <div class="search">
                        <img src="./assets/magnifying-glass-solid.svg" alt="">
                        <select id="priority" name="prio" required>
                            <option value="task_id">Task ID</option>
                            <option value="all">All Records</option>
                            <option value="status">Status</option>
                            <option value="priority">Priority</option>
                        </select>
                        <input type="text" name="search" id="" placeholder="Search">
                        <button type="submit" ><img src="assets/magnifying-glass-solid.svg" alt=""></button>
                    </div>
                    </form>

                </div>
                <?php
                include "showtabels.php";
                ?>

                
            </div>

            <!-- Popup Form -->
            
        </div>




    </div>
    <script src="popup.js"></script>

</body>

</html>