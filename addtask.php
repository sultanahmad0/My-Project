<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Add Your Tasks</title>
</head>

<body>
    <div class="main">
        <div>
            <?php include "sidebar.php"; ?>
        </div>

        <div class="container1">
            <h1>Add Task</h1>
            <div class="show">
                <?php
                include "database.php";
                
                if(!isset($_SESSION['username'])){
                    header("location:logoutshow.php");
                }
                $email = $_SESSION['email'];
                $fetch_query = "SELECT `task_id`,`task_name`,`task_desc`,`task_notes`,`priority`,`datetime`,`current_datetime` FROM `tasks` WHERE `email` = '$email' AND `status` = 'pending' ORDER BY `task_id` DESC LIMIT 5";
                $data = mysqli_query($conn, $fetch_query);
                if (mysqli_num_rows($data) > 0) {
                    echo "<form action='tasks.php' method='post' name='delete_task'>";
                    echo "<table class='data-table'>";
                    echo "<tr>";
                    echo "<th class='heading'>Task Name</th>";
                    echo "<th>Task Description</th>";
                    echo "<th>Task Notes</th>";
                    echo "<th>Priority</th>";
                    echo "<th>Status</th>";
                    echo "<th>Complete</th>";
                    echo "<th>Delete</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($data)) {
                        $date1 = new DateTime($row["datetime"]);
                        $date2 = new DateTime($row["current_datetime"]);

                        $interval = $date1->diff($date2);

                        echo "<tr class='showingdata'>";
                        echo "<td class='heading'>" . $row["task_name"] . "</td>";
                        echo "<td>" . $row["task_desc"] . "</td>";
                        echo "<td>" . $row["task_notes"] . "</td>";
                        echo "<td>" . $row["priority"] . "</td>";
                        echo "<td>" . $interval->format('%d days, %h hours, %i minutes') . "</td>";
                        echo "<td><button type='submit' class='form-btn' name='complete' value='" . $row["task_id"] . "'><img src='./assets/check-solid.svg'></button></td>";
                        echo "<td><button type='submit' class='form-btn' name='delete' value='" . $row["task_id"] . "'><img src='./assets/trash-solid.svg'></button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</form>";
                }
                ?>
            </div>

            <button class="add" onclick="openForm()">
                <div>
                    <img src="./assets/plus-solid.svg" alt="">
                </div>
                <p>Add Task</p>
            </button>

            <div class="container" id="myForm">
                <div class="form-box">
                    <div class="img">
                        <button onclick="closeForm()">
                            <img style="width: 16px;" src="./assets/times-solid (1).svg" alt="">
                        </button>
                    </div>
                    <h1 class="title">Add Task</h1>
                    <div class="underline"></div>

                    <form action="add_task_handle.php" method="POST"id="task-form">
                        <div class="input-group">
                            <div class="input-field namefield">
                                <input type="text" placeholder="Enter Task Name" name="task_name" id="name" required>
                            </div>

                            <div class="input-field description">
                                <input type="text" placeholder="Enter Task Description" name="task_desc" id="email">
                            </div>

                            <div class="input-field">
                                <input type="text" placeholder="Additional Notes?" name="add_notes" id="conpass">
                            </div>
                            <fieldset>
                                <legend>Priority & Datetime</legend>
                                <select id="priority" name="priority" required>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                <div class="date">
                                    <input type="datetime-local" name="datetime" id="" required>
                                </div>
                            </fieldset>

                        </div>

                        <div class="btn-field">
                            <button type="submit" class="signupbtn">
                                Add This
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="popup.js"></script>
</body>

</html>