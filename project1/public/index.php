<?php include "header.php"; 
    require_once '../src/bean.php';
    require_once '../src/connect_db.php';
?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('../img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php
                    $temp = getData("select id_post, name, preview, time, picture_preview, detail, fullname from post inner join user where post.id_user = user.id_user");

                    foreach($temp as $row){
                        $id = $row->cols['id_post'];
                        $name = htmlspecialchars($row->cols['name']);
                        $preview = htmlspecialchars($row->cols['preview']);
                        $time = htmlspecialchars($row->cols['time']);
                        $picture_preview = htmlspecialchars($row->cols['picture_preview']);           
                        $detail = htmlspecialchars($row->cols['detail']);     
                        $fullname = htmlspecialchars($row->cols['fullname']);     

                        echo "<div class='post-preview'>
                                <a href='post.php?id_post=$id'>
                                    <h2 class='post-title'>
                                        $name
                                    </h2>
                                    <h3 class='post-subtitle'>
                                        $preview
                                    </h3>
                                </a>
                                <p class='post-meta'>Posted by <a href='#'>$fullname</a> on $time</p>
                            </div>
                            <hr>";
                    }
                ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

   <?php include "footer.php"; ?>