<?php include "database.php"; if($_SERVER['REQUEST_METHOD'] == 'POST'){ $username = $_POST['name']; $email = $_POST['email']; $password = $_POST['password']; $conpassword = $_POST['conpassword']; if(empty($username) || empty($email) || empty($password) || empty($conpassword)){ echo '<div style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #ff0000; color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); font-size: 12px;"> <span style="margin-left: 10px; color: #fff; font-weight: bold; float: right; font-size: 14px; line-height: 14px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Warning!</strong><br>Input Fields are empty! </div>'; } else { if($password != $conpassword){ echo '<div style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #ff0000; color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); font-size: 12px;"> <span style="margin-left: 10px; color: #fff; font-weight: bold; float: right; font-size: 14px; line-height: 14px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Warning!</strong><br>Password is not same! </div>'; } else{ $query = "INSERT INTO `user` (`username`,`email`,`password`) VALUES ('$username','$email','$password')"; $result = mysqli_query($conn,$query); if($result){ header("location:login.php"); } else{ echo '<div style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #ff0000; color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); font-size: 12px;"> <span style="margin-left: 10px; color: #fff; font-weight: bold; float: right; font-size: 14px; line-height: 14px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Error!</strong><br>There is some error while signing up you. </div>'; } } } } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="shortcut icon" href="Screenshot 2024-06-05 223736.png" type="image/x-icon">
          <title>Sign Up</title>
</head>
<body>
<div class="container">
<div class="form-box">
<h1 class="title">Sign up</h1>
 <div class="underline"></div>

 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="input-group">

                    <div class="input-field namefield">
                        <input type="text" placeholder="Name" name="name" id="name">
                    </div><!--end input field-->

                    <div class="input-field">
                        <input type="email" placeholder="Email" name="email" id="email">
                    </div><!--end input field-->

                    <div class="input-field">
                        <input type="password" placeholder="Password" name="password" id="password">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Confirm Password" name="conpassword" id="conpass">
                    </div>

                    <p> <span class="text">Already a member?</span> <a href="login.php"> Click Here</a></p>

                </div>

                <div class="btn-field"> <button type="submit"  class="signupbtn">
                    Sign up
                </button>
            </div>

            </form>
</div> 
</div>

</body>
</html>