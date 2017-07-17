<?php
    require_once '../src/connect_db.php';

    $id = $_POST['id'];

    if(executeStatement("delete from post where id_user = $id")){
        if(executeStatement("delete from user where id_user = $id")){
             echo "SUCCESS: Delete successfully!";
        exit();
        } else {
             echo "ERROR: Delete fail!";
        exit();
        }
    } else {
         echo "ERROR: Delete fail!";
        exit();
    }
?>