<?php
    session_start();
    require_once '../src/connect_db.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = md5($password);

    $login_user = login_user($username, $password);
    if($login_user){
        $_SESSION['login_user'] = $login_user;
        header('Location:index.php');
        exit();
    } else {
        header('Location:login.php?Error=Login fail!');
        exit();
    }
?>