<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
    <body>
        <?php 
            $nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = "";
            $name = $email = $website = $comment = $gender = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["name"])){
                    $nameErr = "Please enter your name";
                } else {
                    $name = test_input($_POST["name"]);
                    if(!preg_match("/^[a-zA-Z ]*$/", $name)){
                        $nameErr = "Only letters and white space allowed";
                    }
                }
                if (empty($_POST["email"])){
                    $emailErr = "Please enter your email";
                } else {
                    $email = test_input($_POST["email"]);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $emailErr = "Invalid email format";
                    }
                }                
                $website = test_input($_POST["web"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
                    $websiteErr = "Invalid website";
                }

                $comment = test_input($_POST["comment"]);

                if (empty($_POST["gender"])){
                    $genderErr = "Please check your gender";
                } else {
                     $gender = test_input($_POST["gender"]);
                }
            }
            

            function test_input($data){
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="">
                <span class="error">* <?php echo $nameErr;?></span>
            </div> <br>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="">
                <span class="error">* <?php echo $emailErr;?></span>
            </div> <br>
            <div>
                <label for="web">Website:</label>
                <input type="text" name="web" id="web" value="">
                <span class="error">* <?php echo $websiteErr;?></span>
            </div> <br>
            <div>
                <label for="comment">Comment:</label>
                <textarea rows="5" cols="50" name="comment" id="comment"></textarea>
            </div> <br>
            <div>
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" id="gender" value="male">Male
                <input type="radio" name="gender" id="gender" value="female">Female
                <span class="error">* <?php echo $genderErr;?></span>
            </div> <br>
            <div>
                <input type="submit" name="submit" id="submit" value="Submit">
            </div>
        </form>
        <?php
            echo "<h2>Your Input:</h2>";
            echo $name;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $website;
            echo "<br>";
            echo $comment;
            echo "<br>";
            echo $gender;
            echo "<br>";
        ?>
    </body>
</html>