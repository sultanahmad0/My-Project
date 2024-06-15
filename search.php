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

<body>
    <div class="main">
        <div>
            <?php include "sidebar.php";?>
        </div>

        <div class="dashboard">
            <div class="headingtask"><img src="assets/magnifying-glass-solid.svg" alt="">
                <h1>SEARCH HERE</h1>
            </div>
            <div class="mangercontent">
                <div class="managernav">
                    
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="search">
                        <img src="./assets/magnifying-glass-solid.svg" alt="">
                        <select id="priority" name="prio" required>
                            <option value="task_id">Task ID</option>
                            <option value="all">All Records</option>
                            <option value="status">Status</option>
                            <option value="priority">Priority</option>
                        </select>
                        <input type="text" name="search" id="" placeholder="Search" >
                        <button type="submit" ><img src="assets/magnifying-glass-solid.svg" alt=""></button>
                    </div>
                    </form>

                </div>



<?php
if(!isset($_SESSION['username'])){
    header("location:logoutshow.php");
}
include "database.php";

if (isset($_POST['prio']) && isset($_POST['search'])) {
    $option = $_POST['prio'];
    $search = $_POST['search'];

   if ($option == 'all') {
        header("location:taskmanager.php");
    } else {
        if($_SESSION['email']){
            $email = $_SESSION['email'];
        }
        $stmt = $conn->prepare("SELECT `task_id`,`task_name`,`task_desc`,`priority`,`datetime`,`current_datetime`,`status` FROM `tasks` WHERE `$option` = ? AND `email` = '$email'");
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<form action='tasks.php' method='post' name='delete_task' style='width: 90%; margin: auto;'>";
            echo "<table class='data-table'>";
            echo "<tr>";
            echo "<th class='heading'>Task Name</th>";
            echo "<th>Task Description</th>";
            echo "<th>Priority</th>";
            echo "<th>Time Remaning</th>";
            echo "<th>Status</th>";
            echo "<th>Complete</th>";
            echo "<th>Update</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
        
            while ($row = $result->fetch_assoc()) {
                $date1 = new DateTime();
                $date2 = new DateTime($row["datetime"]);
        
                $interval = $date1->diff($date2);
        
                echo "<tr class='showingdata'>";
                echo "<td class='heading' id='task_name'>". ucfirst($row["task_name"]). "</td>";
                echo "<td>". ucfirst($row["task_desc"]). "</td>";
                echo "<td>". ucfirst($row["priority"]). "</td>";
                echo "<td>". $interval->format('%d days, %h hours, %i minutes %s seconds'). "</td>";
                echo "<td>". ucfirst($row["status"]). "</td>";
                echo "<td><button type='submit' class='form-btn' name='complete' value='". $row["task_id"]. "'><img src='./assets/check-solid.svg'></button></td>";
                echo "<td><button type='button' name='update' class='form-btn'><a href='updateform.php?task_id=". $row["task_id"]. "'><img src='./assets/pen-to-square-solid.svg'></a></button></td>";
                echo "<td><button type='submit' class='form-btn' name='delete' value='". $row["task_id"]. "'><img src='./assets/trash-solid.svg'></button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
            }
    }
}
?>
</div>

<!-- Popup Form -->

</div>




</div>
<script src="popup.js"></script>

</body>

</html>