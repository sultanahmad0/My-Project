<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Welcome <?php echo $_SESSION['username']?></title>
</head>

<body>
        <div class="sidebar">
            <div class="intro">
                <img src="./assets/user2.png" alt="">
                <div class="name">
                    <h3>
                        <?php
                        
                        if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }else{
                        header("loacation:logoutshow.php");
                    }
                        ?>
                    </h3>
                    <p>
                        <?php
                        if(isset($_SESSION['username'])){
                        echo $_SESSION['email'];
                    }
                    ?>
                    </p>
                </div>
            </div>
            <ul>
                <a href="dashboard.php" id="inbox-link ">
                    <li class=""><img src="./assets/chart-pie-solid.svg" alt="">Dashboard</li>
                </a>
                <a href="addtask.php">
                    <li class=""><img src="./assets/inbox-solid.svg" alt="">Add Task</li>
                </a>
                <a href="taskmanager.php" id="taskmanager">
                    <li class=""><img src="./assets/chart-line-solid.svg" alt="">Task Manager</li>
                </a>
            </ul>
            <hr>
            <ul>
                <a href="logout.php">
                    <li><img src="./assets/sign-out-alt-solid.svg" alt="">Sign Out</li>
                </a>
                <a href="rateme.php">
                    <li><img src="./assets/star-regular.svg" alt="">Rate Me</li>
                </a>
            </ul>
        </div>




<script src="popup.js"></script>

</body>

</html>