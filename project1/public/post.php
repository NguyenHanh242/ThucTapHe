<?php include "header.php"; 
    require_once '../src/bean.php';
    require_once '../src/connect_db.php';
?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->

    <?php
        $id = $_GET['id_post'];
        if(!isset($id)){
            $temp = getData("select name, preview, time, picture_preview, detail, fullname from post inner join user where post.id_user = user.id_user ORDER BY id_post DESC LIMIT 0, 1");
        } else {
            $temp = getData("select name, preview, time, picture_preview, detail, fullname from post inner join user where post.id_user = user.id_user and id_post = $id");
        }
        

        foreach($temp as $row){
            $name = htmlspecialchars($row->cols['name']);
            $preview = htmlspecialchars($row->cols['preview']);
            $time = htmlspecialchars($row->cols['time']);
            $picture_preview = htmlspecialchars($row->cols['picture_preview']);           
            $detail = htmlspecialchars($row->cols['detail']);     
            $fullname = htmlspecialchars($row->cols['fullname']);    
        ?>
            <header class='intro-header' style="background-image: url('../admin/uploads/<?php echo $picture_preview; ?>')">
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                    <div class='post-heading'>
                        <h1><?php echo $name; ?></h1>
                        <h2 class='subheading'><?php echo $preview; ?></h2>
                        <span class='meta'>Posted by <a href='#'><?php echo $fullname; ?></a> on <?php echo $time; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                    <p><?php echo $detail; ?></p>
                </div>
            </div>
        </div>
    </article>";
    <?php
        }
    ?>
    

    <hr>
<?php include "footer.php"; ?>