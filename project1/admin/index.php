<?php
    include 'header.php';
    require_once '../src/bean.php';
    require_once '../src/connect_db.php';
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
                    <h2 class="sub-header">Section title</h2>                 
                    <div class="table-responsive">
                        <i class="fa fa-plus-square" style="color: green;font-size: xx-large;    padding-left: 10px;" data-toggle="modal" data-target="#addUser"></i>
                        <table class="table table-striped" id="table_user">
                            <thead>
                                <tr>
                                <th>Id User</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Password</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $temp = getData("select * from user");
                                    foreach($temp as $row){
                                        $id = $row->cols['id_user'];
                                        $username = htmlspecialchars($row->cols['username']);
                                        $pass = htmlspecialchars($row->cols['password']);
                                        $re_pass = htmlspecialchars($row->cols['password']);
                                        $fullname = htmlspecialchars($row->cols['fullname']);
                                        echo "<tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>$fullname</td>
                                            <td>$pass</td>
                                            <td>
                                                <button class='btn btn-success' data-toggle='modal' data-target='#editUser' onClick='fillEditForm(\"$id\",\"$username\",\"$pass\",\"$re_pass\", \"$fullname\")'>Edit</button>
                                                <button class='btn btn-success' onClick='deleteUser(\"$id\")'>Delete</button>
                                            </td>
                                        </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
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

        <!--POP UP ADD USER-->
        <div id="addUser" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">

            <!-- Modal content-->
                <div class="modal-content">
                    <form class="form-signin" method="post" name="formAddUser" id="formAddUser">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ad_username">Username:</label>
                                <input type="text" class="form-control" name="ad_username" id="ad_username" value="">
                            </div>
                            <div class="form-group">
                                <label for="ad_password">Password:</label>
                                <input type="password" name="ad_password" id="ad_password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="ad_re_password">Re-password:</label>
                                <input type="password" name="ad_re_password" id="ad_re_password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="ad_fullname">Fullname:</label>
                                <input type="text" name="ad_fullname" id="ad_fullname" class="form-control" value="">
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
        <script src="../js/editUser.js"></script>
        <script src="../js/addUser.js"></script>
        
    </body>
</html>
