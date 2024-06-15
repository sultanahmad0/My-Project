<?php
include "database.php";
$email = $_SESSION['email'];
$query1 = "SELECT `status` FROM `tasks` WHERE `status` = 'pending' AND `email` = '$email'";
$row1 = mysqli_query($conn,$query1);

$num_pending = mysqli_num_rows($row1);

$query2 = "SELECT `status` FROM `tasks` WHERE `status` = 'completed' AND `email` = '$email'";
$row2 = mysqli_query($conn,$query2);

$num_completed = mysqli_num_rows($row2);




?>