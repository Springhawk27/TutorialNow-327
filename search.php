<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: login.php');
}
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorialNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="navbar-brand" href="home.php">
            <i class="fas fa-graduation-cap"></i>
            TutorialNow
        </a>
    </h5>

    <nav class="my-2 my-md-0 mr-md-3">
        <div class="p-2 dropdown">
            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="categoryDropdownLink"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>

            <div class="dropdown-menu" aria-labelledby="categoryDropdownLink">
                <?php
                $show_category = "select * from video_category";
                $result = $conn->query($show_category);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
                <li>
                    <a class="text-dark dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                        <?php echo $row['category_name'] ?>
                    </a>
                <li>
                    <?php
                    }
                    }
                    ?>
            </div>
        </div>
        <ul class="dropdown-menu">
            <?php
            $show_category = "select * from video_category";
            $result = $conn->query($show_category);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
            <li>
                <a class="p-2 text-dark dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name'] ?>
                </a>
            <li>
                <?php
                }
                }
                ?>
        </ul>
        <!--        <a class="p-2 text-dark" href="#">Link 3</a>-->
        <!--        <a class="p-2 text-dark" href="#">Link 3</a>-->
    </nav>
    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
</div>


<div class="container" style="margin-top:70px">
    <div>


        <?php
        $search = $_POST['search'];
        $duration = $_POST['duration'];
        if ($duration == '0') {
            $show_video = "select * from video where caption like '%$search%'";
        }
        else if ($duration == '1-5') {
            $show_video = "select * from video where caption like '%$search%' and duration BETWEEN 1 AND 5 ";
        } else if ($duration == '5-10') {
            $show_video = "select * from video where caption like '%$search%' and duration BETWEEN 5 AND 10 ";
        } else {
            $show_video = "select * from video where caption like '%$search%' and duration NOT BETWEEN 1 AND 10";
        }
        $video_result = $conn->query($show_video);
        if ($video_result->num_rows > 0) {
        ?>

        <div class="container">
            <div class="container outerpadding">
                <div class="row">

                    <?php
                    while ($row_video = $video_result->fetch_assoc()) {
                        $thumbnail_path = "video/" . $row_video['thumbnail_path'];
                        ?>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                            <div class="thumbnail">
                                <a href="video.php?id=<?php echo $row_video['video_id'] ?>">
                                    <img src="<?php echo $thumbnail_path ?>" style="width:100%!important; height:200px">
                                    <div class="caption">
                                        <p><?php echo $row_video['caption'] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <?php
                    }
                    }
        else{
            ?>
            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="px-0">

      <h1 class="display-4 font-italic">No Such Result Found <i class="text-center fas fa-sad-cry"></i></h1>
      <p class="lead my-3">We searched as far as we can But couldn't find what you need</p>
      <p class="lead mb-0"><a href="home.php" class="text-white font-weight-bold">Let's See Home Together....</a></p>
    </div>
  </div>
                    <?php
        }
                    ?>

                </div>
            </div>
        </div>


</body>
</html>