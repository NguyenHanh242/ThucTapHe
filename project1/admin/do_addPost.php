<?php
    require_once '../src/connect_db.php';

    $target_dir = "uploads/";
    $picture = basename($_FILES['picture']['name']);
    $target_file = $target_dir . basename($_FILES['picture']['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

    $name = $_POST['name'];
    $time = date('Y-m-d');
    $id_user = $_POST['id_user'];
//    $picture = $_POST['ad_picture'];
    $preview = $_POST['preview'];
    $detail = $_POST['detail'];

    if(executeStatement("insert into post values (0,'$name', '$preview', '$id_user', '$time', '$picture','$detail')")){
        header('Location:post.php?add successfully');
        exit();
    } else {
        header('Location:post.php?add fail');
        exit();
    }
?>