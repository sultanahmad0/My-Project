<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Me</title>
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
                    <h1 class="title">Rate Me</h1>
                    <div class="underline"></div>

                    <form action="ratemedb.php" method="POST" id="task-form">

                        <div class="input-group">
                            <div class="input-field namefield">
                                <input type="text" placeholder="Enter Your Name 😊*" name="teacher_name" id="name"
                                    value="" required>
                            </div>
                            
                            <fieldset>
                                <legend>Your Rating out of 5</legend>
                                <select id="priority" name="rate" required value="Choose here" style="   margin: 0 0; width: 100%; font-size: 17px;">
                                    <option value="Excellent">Excellent 🫣</option>
                                    <option value="Good">Good 😊</option>
                                    <option value="Better">Better 🙂</option>
                                    <option value="Poor">Poor 🙁</option>
                                    <option value="Very Poor">Very Poor 💔</option>
                                </select>
                            </fieldset>

                            <div class="input-field">
                                <input type="text" placeholder="Comments (Not Necessary)" name="comment">
                            </div>

                        </div>

                        <div class="btn-field">
                            <button type="submit" class="signupbtn">
                                Done!
                            </button>
                        </div>

                    </form>
                </div>
            </div>
</body>
</html>