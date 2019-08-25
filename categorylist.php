<?php
include_once 'admin-header.php';
?>
<?php
$msg = "";
if (isset($_POST['submit'])) {
    $category_id = $_POST['id'];
    $category_delete = "delete from video_category where category_id=$category_id";
    if ($conn->query($category_delete) === TRUE) {
        $msg = "Successfully Deleted";
    }
}
?>


<body id="page-top">


<?php
include_once 'admin-topnav.php';
?>

<div id="wrapper">

    <?php
    include_once 'admin-sidebar.php';
    ?>


    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Category List</li>
            </ol>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <?php
                    if (isset($_POST['submit'])) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $msg; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    <i class="fas fa-list-alt"></i>
                    List of Category
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Serial</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $show_category = "select * from video_category";
                            $result = $conn->query($show_category);
                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td>
                                            <form action="categorylist.php" method="post">
                                                <input type="hidden" name="id"
                                                       value="<?php echo $row['category_id'] ?>">
                                                <input type="submit" name="submit" class="btn btn-danger btn-xs"
                                                       value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © TutorialNow Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include_once 'logout-modal.php';
?>
<!-- Bootstrap core JavaScript-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/popper/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- Core plugin JavaScript-->
<script src="plugins/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</body>

</html>
