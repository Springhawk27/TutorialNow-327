<?php
include_once 'admin-header.php';

?>
<body id="page-top">

<?php
include_once 'admin-topnav.php';
?>
<div id="wrapper">

    <?php
    if ($_SESSION['user_type'] == 0) {
        include_once 'admin-sidebar.php';
    }
    ?>
    <div id="content-wrapper">

        <div class="container-fluid">
            <?php
            if ($_SESSION['user_type'] == 0) {
                ?>

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="admin-dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Categories</li>
                <li><a class="btn btn-info" href="admin-new-category.php" style="position: absolute;
right: 10%;"> <i class="fas fa-plus-circle"></i> <?= $_SESSION['user_type'] ?> Create New</a></li>
            </ol>

            <?php
            }
            $id = $_GET['id'];
            $show_category = "select * from video_category where category_id=$id";
            $result = $conn->query($show_category);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $category_id = $row['category_id'];
                    $show_video = "select * from video where category_id =$category_id";
                    $video_result = $conn->query($show_video);
                    if ($video_result->num_rows > 0) {

                        ?>

                        <div class="jumbotron justify-content-md-end">
                            <div class="container text-center">
                                <h2><?php echo $row['category_name'] ?> Video List</h2>
                                <p class="lead">User Selected Category Will Be Shown Here</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            while ($row_video = $video_result->fetch_assoc()) {
                                $thumbnail_path = "video/" . $row_video['thumbnail_path'];
//                                echo "Thumbnail Path : ". $thumbnail_path;
                                ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"
                                     style="font-size: 18px; padding-bottom: 10px;">

                                    <div class="card shadow-lg" style="width: 22rem;">
                                        <a href="video.php?id=<?php echo $row_video['video_id'] ?>">
                                            <img src="<?php echo $thumbnail_path ?>" class="card-img-top"
                                                 style="width:100%!important; height:200px">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo $row_video['caption'] ?>
                                            </h5>
                                            <a href="#"
                                               class="btn btn-primary btn-block">
                                                <i class="fas fa-play-circle"></i> Watch
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                        <?php

                    }
                }
            }
            ?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
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
