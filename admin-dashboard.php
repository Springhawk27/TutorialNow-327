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
    $userinfo_id = $_POST['id'];
    $user_delete = "delete from userinfo where userinfo_id=$userinfo_id";
    if ($conn->query($user_delete) === TRUE) {
        $msg = "successfully deleted";
    }
}
$total_number_users = $conn->query("SELECT COUNT(*) as total_users FROM userinfo");
$total_number_categories = $conn->query("SELECT COUNT(*) as total_categories FROM video_category");
$total_user_number = $total_number_users->fetch_assoc();
$total_category_number = $total_number_categories->fetch_assoc();

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
        <!--<li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>-->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
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
                <i class="fas fa-fw fa-list-alt"></i>
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
                <li class="breadcrumb-item active">Overview</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-pen-nib"></i>
                            </div>
                            <div class="mr-5">10 Dummy Number Course!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-user-graduate"></i>
                            </div>
                            <div class="mr-5"><h4><?= $total_user_number['total_users'] ?> User</h4></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list-alt"></i>
                            </div>
                            <div class="mr-5"><h4><?=$total_category_number['total_categories']?> Categories!</h4></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="mr-5">13 New User!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>
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
                    <i class="fas fa-table"></i>
                    List of User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $show_user = "select * from userinfo";
                            $result = $conn->query($show_user);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['username'] != "admin") {
//                                        print_r($row);
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fullname'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td>
                                                <form action="admin-dashboard.php" method="post">
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $row['userinfo_id'] ?>">
                                                    <input type="submit" name="submit" class="btn btn-danger btn-xs"
                                                           value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <!--<tr>
                                <td>Mirabelle Sowley</td>
                                <td>msowley0</td>
                                <td>msowley0@macromedia.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Tobe Wogden</td>
                                <td>twogden1</td>
                                <td>twogden1@ted.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Rosa Carberry</td>
                                <td>rcarberry2</td>
                                <td>rcarberry2@usa.gov</td>
                                <td><i class="fas fa-trash"></i></td>

                            </tr>
                            <tr>
                                <td>Levi Cluelow</td>
                                <td>lcluelow3</td>
                                <td>lcluelow3@geocities.com</td>
                                <td><i class="fas fa-trash"></i></td>

                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>accountant1</td>
                                <td>btitta4@woothemes.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>integrationspecialist2</td>
                                <td>jcrucitti5@pen.io</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>dfarthing6@prweb.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>integrationspecialist3</td>
                                <td>tblaxill7@scribd.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>javascriptdeveloper2</td>
                                <td>jcaldecutt8@hao123.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>dummyusersoft6</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>regionaldirector1</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Tatyana Fitzpatrick</td>
                                <td>regionaldirector2</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Michael Silva</td>
                                <td>Marketing Designer</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Paul Byrd</td>
                                <td>cfo1</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Bradley Greer</td>
                                <td>dummyusersoft1</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jenette Caldwell</td>
                                <td>Development Lead</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Yuri Berry</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Caesar Vance</td>
                                <td>presalessupport1</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Angelica Ramos</td>
                                <td>ceo1</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Gavin Joyce</td>
                                <td>Developer</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jennifer Chang</td>
                                <td>regionaldirector3</td>
                                <td>Singapore</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Brenden Wagner</td>
                                <td>dummyusersoft2</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Fiona Green</td>
                                <td>Chief Operating Officer (COO)</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Shou Itou</td>
                                <td>Regional Marketing</td>
                                <td>Tokyo</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Michelle House</td>
                                <td>integrationspecialist1</td>
                                <td>Sidney</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>Developer</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Prescott Bartlett</td>
                                <td>Technical Author</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Gavin Cortez</td>
                                <td>Team Leader</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Martena Mccray</td>
                                <td>Post-Sales support</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Unity Butler</td>
                                <td>Marketing Designer</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Howard Hatfield</td>
                                <td>Office Manager</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Hope Fuentes</td>
                                <td>Secretary</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Vivian Harrell</td>
                                <td>Financial Controller</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Timothy Mooney</td>
                                <td>Office Manager</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jackson Bradshaw</td>
                                <td>Director</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Olivia Liang</td>
                                <td>Support Engineer</td>
                                <td>Singapore</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Bruno Nash</td>
                                <td>dummyusersoft3</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Sakura Yamamoto</td>
                                <td>Support Engineer</td>
                                <td>Tokyo</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Thor Walton</td>
                                <td>Developer</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Finn Camacho</td>
                                <td>Support Engineer</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Serge Baldwin</td>
                                <td>Data Coordinator</td>
                                <td>Singapore</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Zenaida Frank</td>
                                <td>dummyusersoft4</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Zorita Serrano</td>
                                <td>dummyusersoft5</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jennifer Acosta</td>
                                <td>javascriptdeveloper33</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Cara Stevens</td>
                                <td>Sales Assistant</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Hermione Butler</td>
                                <td>regionaldirector4</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Lael Greer</td>
                                <td>Systems Administrator</td>
                                <td>dummylondon@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Jonas Alexander</td>
                                <td>Developer</td>
                                <td>dummysanfrancisco@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Shad Decker</td>
                                <td>regionaldirector5</td>
                                <td>dummyedinburgh@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Michael Bruce</td>
                                <td>javascriptdeveloper1</td>
                                <td>Singapore</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>dummynewyork@email.com</td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>-->
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</body>

</html>
