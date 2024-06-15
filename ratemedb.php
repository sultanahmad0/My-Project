<?php
include "database.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $teacher_name = $_POST['teacher_name'];
    session_start();
    $_SESSION['name'] = $teacher_name;
    $rate = $_POST['rate'];
    $comment = $_POST['comment'];
    $rating_num = 0;
    if($rate == "Excellent"){
        $rating_num = 5;
    }elseif($rate == "Good"){
        $rating_num = 4;
    }elseif($rate == "Better"){
        $rating_num = 3;
    }elseif($rate == "Poor"){
        $rating_num = 2;
    }elseif($rate == "Very Poor"){
        $rating_num = 1;
    }

    $sql = "INSERT INTO `rateme` (`teacher_name`, `rating_num`, `rating`, `comment`) VALUES ('$teacher_name', '$rating_num', '$rate', '$comment')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:thanks.php");
    }
}

?>