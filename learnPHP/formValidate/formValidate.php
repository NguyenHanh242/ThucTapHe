<!DOCTYPE HTML>
<html>
<head>
</head>
    <body>
        <?php 
            $name = $email = $website = $comment = $gender = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = test_input($_POST["name"]);
                $email = test_input($_POST["email"]);
                $website = test_input($_POST["web"]);
                $comment = test_input($_POST["comment"]);
                $gender = test_input($_POST["gender"]);
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
            </div> <br>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="">
            </div> <br>
            <div>
                <label for="web">Website:</label>
                <input type="text" name="web" id="web" value="">
            </div> <br>
            <div>
                <label for="comment">Comment:</label>
                <textarea rows="5" cols="50" name="comment" id="comment"></textarea>
            </div> <br>
            <div>
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" id="gender" value="male">Male
                <input type="radio" name="gender" id="gender"value="female">Female
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