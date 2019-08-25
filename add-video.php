<?php
include_once 'admin-header.php';

$msg="";
if(isset($_POST['submit']))
{

    $target_dir = "video/";
    $target_file = $target_dir . basename($_FILES["video_path"]["name"]);
    $video_path = basename($_FILES["video_path"]["name"]);
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($videoFileType != "mp4") {
        echo "Sorry, only MP4 is  allowed for video.";
    }else {
        if (move_uploaded_file($_FILES["video_path"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $target_dir = "video/";
    $target_file = $target_dir . basename($_FILES["thumbnail_path"]["name"]);
    $thumbnail_path = basename($_FILES["thumbnail_path"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for Thumbnail.";
    }else {
        if (move_uploaded_file($_FILES["thumbnail_path"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $category_id = $_POST['category_id'];
    $caption = $_POST['caption'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    $upload_video ="INSERT INTO `video`(`video_path`, `video_ext`, `thumbnail_path`, `category_id`, `caption`, `description`, `duration`) VALUES ('$video_path','$videoFileType','$thumbnail_path','$category_id','$caption','$description',$duration)";

    if ($conn->query($upload_video) === TRUE) {
        $msg="successfully Uploaded";
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
                <li class="breadcrumb-item active">Add New Video</li>
            </ol>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
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
                </div>
                <div class="col-lg-4"></div>
            </div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    <i class="fas fa-plus-circle"></i>
                    Add a New Video
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="add-video.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="video_path">Video Upload:</label>
                                <input type="file" class="form-control" id="video_path" name="video_path" required>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail_path">Thumbnail Upload:</label>
                                <input type="file" class="form-control" id="thumbnail_path" name="thumbnail_path" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <?php
                                    $show_category ="select * from video_category";
                                    $result = $conn->query($show_category);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="help-block"><a href="admin-new-category.php">Add Category</a></p>
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption:</label>
                                <input type="text" class="form-control" id="caption" name="caption" required>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration:</label>
                                <input type="number" class="form-control" id="duration" name="duration" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Upload">
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>


        </div>
        <!-- /.container-fluid -->

        <?php
        include_once 'admin-footer.php';
        ?>

    </div>
    <!-- /.content-wrapper -->

</div>
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
