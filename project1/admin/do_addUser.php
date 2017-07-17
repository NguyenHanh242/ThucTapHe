<?php
    require_once '../src/connect_db.php';

    $username = $_POST['ad_username'];
    $password = $_POST['ad_password'];
    $password = md5($password);
    $fullname = $_POST['ad_fullname'];

    if(executeStatement("insert into user values (0,'$username', '$password', '$fullname')")){
        echo "SUCCESS: Add successfully!";
        exit();
    } else {
        echo "ERROR: Add fail!";
        exit();
    }
?>