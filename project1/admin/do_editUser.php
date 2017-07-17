<?php
    require_once '../src/connect_db.php';

    $id = $_POST['up_id'];
    $username = $_POST['up_username'];
    $password = $_POST['up_password'];
    $password = md5($password);
    $fullname =$_POST['up_fullname'];

    if(userIsExist($id, $username)){
        echo "ERROR: Username is exist!";
        exit();
    }
    if(executeStatement("update user set username='$username',password='$password', fullname='$fullname' where id_user=$id")){
        echo "SUCCESS: Update successfully!";
        exit();
    } else {
        echo "ERROR: Update fail!";
        exit();
    }
?>