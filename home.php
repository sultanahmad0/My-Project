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
</head>
<style>
</style>
<body>
    <div class="main">
        <div>
            <?php include "sidebar.php"; 
            if(!isset($_SESSION['email'])){
                header("location:logoutshow.php");
            }?>
        </div>
        <div class="inbox-content">
            <div class="content">
                <h1>Welcome
                    <?php echo $_SESSION['username']?>
                </h1>
                <p>Your personal space where tasks become achievements. Let's turn your goals into reality, one
                    checkmark at a time. Start organizing your day with ease and watch your productivity soar!</p><p>
                    Happy tasking! ✅</p>
                    <a href="addtask.php">
                        <button class="add">
                            <div>
                            <img src="./assets/plus-solid.svg" alt="">
                            </div>
                            <p>Add Task</p>
                        </button>
                    </a>
            </div>
        </div>

    </div>
    

    <script src="popup.js"></script>

</body>

</html>