<?php
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["fileUpload"]["name"]);
    $upload_ok = 1;
    $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if($check !== false){
            echo "Image ".$check["mime"].".";
            $upload_ok = 1;
        } else {
            echo "not image";
            $upload_ok = 0;
        }
    }

?>