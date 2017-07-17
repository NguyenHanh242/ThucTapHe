<?php
    include 'header.php';
    require_once '../src/bean.php';
    require_once '../src/connect_db.php';
    if(!isset($_SESSION["login_user"])){
        $_SESSION["errorStr"]="Please log in";
        header("Location:../admin/login.php");
        exit();
    }

?>

        <div class="container-fluid">
            <div class="row">
                <?php
                    include 'sidebar.php';
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="inform" class="alert">
                        <strong><span class="glyphicon"></span><span></span></strong><span></span>
                    </div>
                    <h2 class="sub-header">About</h2>                 
                    <?php
                        $temp = getData("select * from about where id_about = 1");
                        foreach($temp as $obj){
                            $preview =htmlspecialchars($obj->cols["preview"]);
                            $detail = htmlspecialchars($obj->cols["detail"]);
                    ?>
                    <div class="table-responsive">
                        <form id='formAbout' name='formAbout' method='post'>
                            <div class='form-group'>
                                <label for="preview">Preview</label>
                                <textarea rows="3" cols="7" id="preview" name="preview"class="form-control"><?php echo $preview; ?></textarea>
                            </div>
                            <div class='form-group'>
                                <label for="detail">Detail</label>
                                <textarea rows="6" cols="10" id="detail" name="detail"class="form-control"><?php echo $detail; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-right">Update</button>
                            </div>
                            
                        </form>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--POP UP EDIT USER-->
        <div id="editUser" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">

            <!-- Modal content-->
                <div class="modal-content">
                    <form class="form-signin" method="post" name="formEditUser" id="formEditUser">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id">ID:</label>
                                <input type="text" class="form-control" name="id" id="id" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Re-password:</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Fullname:</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                        
                </div>

            </div>
        </div>

       
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script>window.jQuery || document.write('<script src="../vendor/jquery/jquery.min.js"><\/script>')</script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="http://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="../js/about.js"></script>
    </body>
</html>
