<?php include 'page-header.php';?>
<body>
    <!-- Left Panel -->
    <?php include 'page-panel.php'; ?>
    <!-- Right Panel -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ TÀI KHOẢN</h1>
                </div>
            </div>
        </div>
        <!--<div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a class="btn btn-primary" href="user-create.php">Tạo tài khoản</a></li>
                        
                    </ol>
                </div>
            </div>
        </div>-->
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Money</th>
                                    <th>Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    include 'database.php';
                                    $conn = Database::connect();
                                    $sql = "SELECT * FROM user";
                                    $results = mysqli_query($conn, $sql);
                                    if ($results->num_rows > 0) {
                                        // output data of each row
                                        while($row = $results->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>'. $row['username'].' </td>';
                                            echo '<td>'. $row['name'] . '</td>';
                                            echo '<td>'. $row['gender'] . '</td>';
                                            echo '<td>'. $row['DOB'] . '</td>';
                                            echo '<td>'. $row['mail'] .'</td>';
                                            echo '<td>'. $row['money'] . '</td>';
                                            echo '<td width=250>';
                                            echo '<a class="btn btn-success" href="user-detail.php?username='.$row['username'].'">Chi tiết</a>';
                                            echo '&nbsp;';
                                            echo '<a class="btn btn-danger" href="user-delete.php?username='.$row['username'].'">Xóa</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }                
                                    }else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                              </table>
                         </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
<!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
