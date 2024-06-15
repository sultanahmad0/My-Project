<?php
include "database.php";
$task_id = $_GET['task_id'];
$fetch_query = "SELECT `task_name`,`task_desc`,`task_notes`,`priority`,`datetime` FROM `tasks` WHERE `task_id` = '$task_id'";
$data = mysqli_query($conn, $fetch_query);
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation...</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container" style="display:block;" id="myForm">
                <div class="form-box">
                    <div class="img">
                        <button onclick="closeForm()">
                            <img style="width: 16px;" src="./assets/times-solid (1).svg" alt="">
                        </button>
                    </div>
                    <h1 class="title">Update Data</h1>
                    <div class="underline"></div>

                    <form action="updatedata.php?task_id=<?php echo $task_id; ?>" method="POST" id="task-form">

                        <div class="input-group">
                            <div class="input-field namefield">
                                <input type="text" placeholder="Enter Task Name" name="task_name" id="name"
                                    value="<?php echo $row["task_name"] ?>" required>
                            </div>

                            <div class="input-field description">
                                <input type="text" placeholder="Enter Task Description" name="task_desc" id="email"
                                    value="<?php echo $row["task_desc"] ?>">
                            </div>

                            <div class="input-field">
                                <input type="text" placeholder="Additional Notes?" name="add_notes" id="conpass"
                                    value="<?php echo $row["task_notes"] ?>">
                            </div>
                            <fieldset>
                                <legend>Priority & Datetime</legend>
                                <select id="priority" name="priority" required>
                                    <option value="low" <?php echo ($row["priority"] == "low")? "selected" : "";?>>Low</option>
                                    <option value="medium" <?php echo ($row["priority"] == "medium")? "selected" : "";?>>Medium</option>
                                    <option value="high" <?php echo ($row["priority"] == "high")? "selected" : "";?>>High</option>
                                </select>
                                <div class="date">
                                    <input type="datetime-local" name="datetime" id="" value="<?php echo date("Y-m-d\TH:i", strtotime($row["datetime"]))?>" required>
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
</body>
</html>