<?php
    require_once '../src/connect_db.php';

    $id = $_POST['id_post'];

    if(executeStatement("delete from post where id_post = $id")){
            echo "SUCCESS: Delete successfully!";
    exit();
    } else {
            echo "ERROR: Delete fail!";
    exit();
    }

?>