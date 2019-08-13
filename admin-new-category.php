<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: login.php');
} else {
    if ($_SESSION["username"] != "admin") {
        header('Location: admin-dashboard.php');
    }
}
require 'connection.php';
$msg = "";
if (isset($_POST['submit'])) {


    $category_name = $_POST['category_name'];

    $add_category = "INSERT INTO `video_category`(`category_name`) VALUES ('$category_name')";

    if ($conn->query($add_category) === TRUE) {
        $msg = "Successfully Added";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorialNow | Add Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css"/>
    <link href="css/sb-admin.css" rel="stylesheet">


</head>
<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="admin-dashboard.php">TutorialNow</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="admin-dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Categories</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                <h6 class="dropdown-header">
                   <a href="categorylist.php"> Category List </a>
                </h6>
                <?php
                $show_category = "select * from video_category";
                $result = $conn->query($show_category);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a class="dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                            <?php echo $row['category_name'] ?>
                        </a>

                        <?php
                    }
                }
                ?>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">New:</h6>
                <a class="dropdown-item" href="admin-new-category.php">Create New</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="videosDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-video"></i>
                <span>Videos</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="admin-videos.php"><i class="fas fa-list-alt"></i> Video List</a>
                <a class="dropdown-item" href="upload-video.php"><i class="fas fa-plus-circle"></i> Upload Video</a>
            </div>
        </li>
    </ul>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>
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
