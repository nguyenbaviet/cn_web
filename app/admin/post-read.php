<?php include 'page-header.php';?>
    <!-- Left Panel -->
    <?php include 'page-panel.php'; ?>
    <!-- Right Panel -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>QUẢN TRỊ BÀI ĐĂNG</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <!--<div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a class="btn btn-primary" href="post-create.php"> Tạo bài đăng </a></li>
                    </div>
                </div>-->
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách bài đăng</strong>
                            </div>
                            <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>User</th>
                
                                    <th>Tiêu đề</th>
                                    <th>Mức lương</th>
                                    <th>Thời hạn</th>
                                    <th>Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    include 'database.php';
                                    $conn = Database::connect();
                                    $sql = "SELECT * FROM job";
                                    $results = mysqli_query($conn, $sql);
                                    if ($results->num_rows > 0) {
                                        // output data of each row
                                        while($row = $results->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>'. $row['Id'] . '</td>';           
                                            echo '<td>'. $row['idUser'] . '</td>';         
                                            echo '<td>'. $row['title'] . '</td>';
                                            echo '<td>'. $row['salary'] . '</td>';
                                            echo '<td>'. $row['deadline'] . '</td>';
                                            echo '<td width=250>';
                                            echo '&nbsp;';
                                            echo '<a class="btn btn-danger" href="post-delete.php?id='.$row['Id'].'">Xóa</a>';
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


    </div><!-- /#right-panel -->

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
