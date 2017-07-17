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
                    <h2 class="sub-header">User</h2>                 
                    <div class="table-responsive">
                        <i class="fa fa-plus-square" style="color: green;font-size: xx-large;    padding-left: 10px;" data-toggle="modal" data-target="#addPost"></i>
                        <table class="table table-striped" id="table_user">
                            <thead>
                                <tr>
                                <th>Id post</th>
                                <th>Name</th>
                                <th>Preview</th>
                                <th>Fullname</th>
                                <th>Time</th>
                                <th>Picture</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $temp = getData("select id_post, name, preview, time, picture_preview, detail, fullname, post.id_user from post inner join user where post.id_user = user.id_user");
                                    foreach($temp as $row){
                                        $id = $row->cols['id_post'];
                                        $name = htmlspecialchars($row->cols['name']);
                                        $preview = htmlspecialchars($row->cols['preview']);
                                        $fullname = htmlspecialchars($row->cols['fullname']);
                                        $idUser = $row->cols['id_user'];
                                        $time = htmlspecialchars($row->cols['time']);
                                        $picture = htmlspecialchars($row->cols['picture_preview']);
                                        $detail = htmlspecialchars($row->cols['detail']);
                                        ?>
                                        <tr>
                                            <td class="id_post"><?php echo $id; ?></td>
                                            <td class="idUser" style="display:none;"><?php echo $idUser; ?></td>
                                            <td class="name" style='width: 100px;'><?php echo $name; ?></td>
                                            <td class="preview" style='width: 200px;'><?php echo $preview; ?></td>
                                            <td class="fullname"><?php echo $fullname; ?></td>
                                            <td><?php echo $time; ?></td>
                                            <td> <img class="picture" src="../admin/uploads/<?php echo $picture; ?>" alt='' style='width: 200px; height: 150px;'></td>
                                            <td class="detail" style="display:none;"><?php echo $detail; ?></td>
                                            <td>
                                                <button class='btn btn-success edit' data-toggle='modal' data-target='#editPost' >Edit</button>
                                                <button class='btn btn-success' onClick="delPost('<?php echo $id; ?>')">Delete</button>
                                            </td>
                                        </tr>
                                        <?php            
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--POP UP EDIT USER-->
        <div id="editPost" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

            <!-- Modal content-->
                <div class="modal-content">
                    <form class="form-signin" method="post" name="formEditPost" id="formEditPost" enctype="multipart/form-data" action="do_editPost.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Post</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="up_id">Id post:</label>
                                <input type="text" class="form-control" name="up_id" id="up_id" value="" readonly>
                            </div>
                            <div style='display:none'>
                                <input type="text" class="form-control" name="picture_old" id="picture_old" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="up_name">Name:</label>
                                <input type="text" class="form-control" name="up_name" id="up_name" value="">
                            </div>
                            <div class="form-group">
                                <label for="up_id_user">Id User</label>
                                <select name="up_id_user" id="up_id_user" class="form-control"> 
                                <?php
                                    $tmp = getData("select id_user from user");
                                    foreach($tmp as $row){
                                        $id_user = $row->cols['id_user'];
                                        echo "<option value='$id_user'>$id_user</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="up_picture">Picture: </label>
                                <img src="" name="up_picture" id="up_picture" alt="" style="width: 200px; height: 150px; margin-bottom: 10px;">
                                <input type="file" name="picture_file" id="picture_file" value="">
                            </div>
                            <div class="form-group">
                                <label for="up_preview">Preview:</label>
                                <textarea rows="3" class="form-control" id="up_preview" name="up_preview"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="up_detail">Detail:</label>
                                <textarea rows="5" class="form-control" id="up_detail" name="up_detail"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                        
                </div>

            </div>
        </div>

        <!--POP UP ADD USER-->
        <div id="addPost" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

            <!-- Modal content-->
                <div class="modal-content">
                    <form class="form-signin" method="post" name="formAddUser" id="formAddUser" enctype="multipart/form-data" action="do_addPost.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Post</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="id_user">Id User</label>
                                <select name="id_user" id="id_user" class="form-control"> 
                                <?php
                                    $tmp = getData("select id_user from user");
                                    foreach($tmp as $row){
                                        $id_user = $row->cols['id_user'];
                                        echo "<option value='$id_user'>$id_user</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture: </label>
                                <input type="file" name="picture" id="picture" value="">
                            </div>
                            <div class="form-group">
                                <label for="preview">Preview:</label>
                                <textarea rows="3" class="form-control" id="preview" name="preview"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail:</label>
                                <textarea rows="5" class="form-control" id="detail" name="detail"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
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
        <script src="../js/editPost.js"></script>
        <script src="../js/addPost.js"></script>

        
    </body>

<script type="text/javascript">
    $(document).ready(function(){

            $("#table_user").on('click', '.edit', function() {
                var rowSelected = $(this).closest('tr');
                var id = rowSelected.find('.id_post').text();
                var idUser = rowSelected.find('.idUser').text();
                var name = rowSelected.find('.name').text();
                var picture = rowSelected.find('.picture').attr('src');
                var preview = rowSelected.find('.preview').text();
                var detail = rowSelected.find('.detail').text();
                $("#up_id").val(id);
                $("#up_name").val(name);
                $("#up_id_user").val(idUser);
                $("#up_picture").attr("src", picture);
                $("#up_preview").val(preview);
                $("#up_detail").val(detail);
                $("#picture_old").val(picture.split('/').pop());
            });
    });
</script>
</html>
