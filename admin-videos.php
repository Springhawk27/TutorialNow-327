<?php
session_start();
if(empty($_SESSION["username"]))
{
    header('Location: login.php');
}else{
    if($_SESSION["username"] != "admin")
    {
        header('Location: admin-dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | TutorialNow</title>

    <!-- Custom fonts for this template-->
    <link href="plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="plugins/datatables/dataTables.bootstrap4.min.css">
    <!-- Custom styles for this template-->
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
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Categories</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                <h6 class="dropdown-header">Category List :</h6>
                <a class="dropdown-item" href="categories.php">PHP</a>
                <a class="dropdown-item" href="categories.php">HTML</a>
                <a class="dropdown-item" href="categories.php">JavaScript</a>
                <a class="dropdown-item" href="categories.php">CSS</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">New:</h6>
                <a class="dropdown-item" href="admin-new-category.php">Create New</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="videosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-video"></i>
                <span>Videos</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="admin-videos.php"><i class="fas fa-list-alt"></i> Video List</a>
                <a class="dropdown-item" href="upload-video.php"><i class="fas fa-plus-circle"></i> Upload Video</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Videos List</li>
            </ol>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    <i class="fas fa-table"></i>
                    Dummy Videos List Table Example</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Video Path</th>
                                <th>Video Extension</th>
                                <th>Thumbnail Path</th>
                                <th>Category</th>
                                <th>Caption</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Serial</th>
                                <th>Video Path</th>
                                <th>Video Extension</th>
                                <th>Thumbnail Path</th>
                                <th>Category</th>
                                <th>Caption</th>
                                <th>Description</th>
                                <th>Action</th>                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>Mirabelle Sowley</td>
                                <td>msowley0</td>
                                <td>msowley0</td>
                                <td>msowley0</td>
                                <td>msowley0</td>
                                <td>msowley0</td>
                                <td>msowley0@macromedia.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Tobe Wogden</td>
                                <td>twogden1</td>
                                <td>twogden1</td>
                                <td>twogden1</td>
                                <td>twogden1</td>
                                <td>twogden1</td>
                                <td>twogden1@ted.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Rosa Carberry</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2@usa.gov</td>
                                <td><i class="fas fa-trash"></i></td>

                            </tr>
                            <tr>
                                <td>Levi Cluelow</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3@geocities.com</td>
                                <td><i class="fas fa-trash"></i></td>

                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>accountant1</td>
                                <td>accountant1</td>
                                <td>accountant1</td>
                                <td>accountant1</td>
                                <td>accountant1</td>
                                <td>btitta4@woothemes.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>integrationspecialist2</td>
                                <td>integrationspecialist2</td>
                                <td>integrationspecialist2</td>
                                <td>integrationspecialist2</td>
                                <td>integrationspecialist2</td>
                                <td>jcrucitti5@pen.io</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>sales1</td>
                                <td>sales1</td>
                                <td>sales1</td>
                                <td>sales1</td>
                                <td>sales1</td>
                                <td>dfarthing6@prweb.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>integrationspecialist3</td>
                                <td>integrationspecialist3</td>
                                <td>integrationspecialist3</td>
                                <td>integrationspecialist3</td>
                                <td>integrationspecialist3</td>
                                <td>tblaxill7@scribd.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>javascriptdeveloper2</td>
                                <td>javascriptdeveloper2</td>
                                <td>javascriptdeveloper2</td>
                                <td>javascriptdeveloper2</td>
                                <td>javascriptdeveloper2</td>
                                <td>jcaldecutt8@hao123.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>dummyusersoft6</td>
                                <td>dummyusersoft6</td>
                                <td>dummyusersoft6</td>
                                <td>dummyusersoft6</td>
                                <td>dummyusersoft6</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>officemanager1</td>
                                <td>officemanager1</td>
                                <td>officemanager1</td>
                                <td>officemanager1</td>
                                <td>officemanager1</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
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

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>

</html>
