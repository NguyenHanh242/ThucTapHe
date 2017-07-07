<?php include "header.php"; 
        // include "src/connect_db.php";
        // include "src/bean.php";
        require_once "src/connect_db.php";
           require_once "src/bean.php";
?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <hr class="small">
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <?php 
                $temp = getData("select * from about where id_about = 1");
                foreach($temp as $obj){
                    $preview = $obj->cols["preview"];
                    $detail = $obj->cols["detail"];
                    echo "<div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                    <p>".$preview."</p>
                    <p>".$detail."</p>
                    </div>";
                }
            ?>
            
        </div>
    </div>

    <hr>
<?php include "footer.php"; ?>