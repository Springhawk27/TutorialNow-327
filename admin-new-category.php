<?php
include_once 'admin-header.php';
$msg = "";
if (isset($_POST['submit'])) {


    $category_name = $_POST['category_name'];

    $add_category = "INSERT INTO `video_category`(`category_name`) VALUES ('$category_name')";

    if ($conn->query($add_category) === TRUE) {
        $msg = "Successfully Added";
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
                    <a href="admin-dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">New Category</li>
            </ol>
            <div class="row">
                <div class="card card-login mx-auto mt-5">
                    <?php
                    if(isset($_POST['submit']))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $msg;?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="card-header">New Tutorial Category</div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4>Enter Your Category Name</h4>
                        </div>
                        <form method="post" action="admin-new-category.php">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="category_name" name="category_name" class="form-control"
                                           placeholder="Enter Category Name" required>
                                    <label for="category_name">Enter Category Name</label>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add Category"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <?php
        include_once 'admin-footer.php';
        ?>

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

</body>
</html>
