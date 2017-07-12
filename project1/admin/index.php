<?php
    include 'header.php';
    require_once '../src/bean.php';
    require_once '../src/connect_db.php';
?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Analytics</a></li>
                        <li><a href="#">Export</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h2 class="sub-header">Section title</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                        $fullname = htmlspecialchars($row->cols['fullname']);
                                        echo "<tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>$fullname</td>
                                            <td>$pass</td>
                                            <td>
                                                <button class='btn btn-success'>Edit</button>
                                                <button class='btn btn-success'>Delete</button>
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

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../vendor/jquery/jquery.min.js"><\/script>')</script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="http://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
