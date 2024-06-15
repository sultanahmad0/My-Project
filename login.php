<?php
session_start();
include "database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        $dbuser = $row['username'];
        $dbemail = $row['email'];
        $_SESSION['username'] = $dbuser;
        $_SESSION['email'] = $dbemail;
        header("location:home.php");
    }
    else{
        echo '<div id="alert" style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #ff0000; color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); font-size: 12px;">
  <span style="margin-left: 10px; color: #fff; font-weight: bold; float: right; font-size: 14px; line-height: 14px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display=\'none\';">&times;</span>
  <strong>Error!</strong><br>Password or Email must be wrong!
</div>';
echo '<script>setTimeout(function() { document.getElementById("alert").style.display = "none"; }, 2000);</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="shortcut icon" href="Screenshot 2024-06-05 223736.png" type="image/x-icon">

    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
        <h1 class="title">Login</h1>
         <div class="underline"></div>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="input-group">

                

                <div class="input-field">
                    <input type="email" placeholder="Email" name="email">
                </div><!--end input field-->

                <div class="input-field">
                    <input type="password" placeholder="Password" name="password">
                </div><!--end input field-->

                <p> <span class="text">New Here?</span> <a href="signup.php"> Click Here</a></p>

            </div><!--end input group-->

            <div class="btn-field"> <button type="submit" class="signupbtn">
                Login
            </button>
            <!-- <button type="submit" class="disable signinbtn">
                Sign in
            </button> -->
        </div>
            <!--end btn field-->

        </form>
</div> <!--end form box-->
</div><!-- end container -->
</body>
</html>