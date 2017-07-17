<?php
    require_once '../src/connect_db.php';

    $target_dir = "uploads/";
    $picture = basename($_FILES['picture_file']['name']);
    $target_file = $target_dir . basename($_FILES['picture_file']['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["picture_file"]["tmp_name"], $target_file);
    
    $picture_old = $target_dir.basename($_POST['picture_old']);


    $id = $_POST['up_id'];
    $name = $_POST['up_name'];
    $time = date('Y-m-d');
    $id_user = $_POST['up_id_user'];
    $preview = $_POST['up_preview'];
    $detail = $_POST['up_detail'];
    if($picture == ""){
        if(executeStatement("update post set name='$name',preview='$preview', id_user='$id_user', time = '$time', detail = '$detail' where id_post=$id")){
            header('Location:post.php?edit successfully');
            exit();
        } else {
            header('Location:post.php?edit fail');
            exit();
        }
    }
    if(executeStatement("update post set name='$name',preview='$preview', id_user='$id_user', time = '$time', picture_preview = '$picture', detail = '$detail' where id_post=$id")){
        unlink($picture_old);
        header('Location:post.php?edit successfully');
        exit();
    } else {
        header('Location:post.php?edit fail');
        exit();
    }
?>