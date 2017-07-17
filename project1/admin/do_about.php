<?php
    require_once '../src/connect_db.php';

    $preview = $_POST['up_preview'];
    $detail = $_POST['up_detail'];

    if(executeStatement("update about set preview='$preview',detail='$detail' where id_about = 1")){
        echo "SUCCESS: Update successfully!";
        exit();
    } else {
        echo "ERROR: Update fail!";
        exit();
    }

?>