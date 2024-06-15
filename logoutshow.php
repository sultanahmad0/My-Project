<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks</title>
    <link rel="stylesheet" href="index.css">
</head>
<style>
    .finish{
        border-radius: 5px;
        margin: 15px 108px;
        padding: 12px;
        border: 1px solid;
        background-color:#3649df;
        cursor:pointer;
    }
    .finish:hover{
        scale:1.01;
    }
    .finish a{
        text-decoration:none;
        color:white;
    }
</style>
<body>

<div class="container" style="display:block;" id="myForm">
                <div class="form-box">
                    <img style= 'width:10%;' src="./assets/sign-out-alt-solid.svg" alt="">
                    <div class="img">
                        <button onclick="closeForm()">
                            <img style="width: 16px;" src="./assets/times-solid (1).svg" alt="">
                        </button>
                    </div>
                    <h1 class="title">Youv'e been Logged Out!</h1>
                    <div class="underline"></div>
                    <p style="width:70%;margin:auto;text-align: justify;font-size: 16px;font-weight: 400;"><strong>You are Logged Out! Try To Login to Continue</strong> </p>
                    <div class="finish">
                    <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
</body>
</html>