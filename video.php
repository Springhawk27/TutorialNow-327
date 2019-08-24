<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: login.php');
}
require 'connection.php';

$email = $_SESSION["email"];
$user_id = 0;
$search_user = "select * from userinfo where email='$email'";
$result_user = $conn->query($search_user);
if ($result_user->num_rows > 0) {
    while ($row_user = $result_user->fetch_assoc()) {
        $user_id = $row_user['userinfo_id'];
    }
}
if (isset($_POST['playlist'])) {
    $video_id = $_POST['video_id'];
    $insert_bookmark = "INSERT INTO `bookmarks`(`user_id`, `video_id`) VALUES ($user_id,$video_id)";
    $conn->query($insert_bookmark);
}

if (isset($_POST['submit_comment'])) {
    $video_id = $_POST['video_id'];
    $comment = $_POST['comment'];
    $insert_comment = "INSERT INTO `comment`(`user_id`, `video_id`, `comment`) VALUES ($user_id,$video_id,'$comment')";
    $conn->query($insert_comment);
}
if (isset($_POST['submit'])) {
    $comment_id = $_POST['commentid'];
    $comment_delete = "delete from comment where comment_id=$comment_id";
    if ($conn->query($comment_delete) === TRUE) {
        $msg = "successfully deleted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorialNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css">
    <!--    Design For Comment Section-->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.css">
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
<!--        <ul class="dropdown-menu">
            <?php
/*            $show_category = "select * from video_category";
            $result = $conn->query($show_category);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            */?>
            <li>
                <a class="p-2 text-dark dropdown-item" href="categories.php?id=<?php /*echo $row['category_id'] */?>">
                    <?php /*echo $row['category_name'] */?>
                </a>
            <li>
                <?php
/*                }
                }
                */?>
        </ul>
-->
    </nav>
    <a class="p-2 text-dark btn-link" href="profile.php"><i class="fas fa-user-astronaut"></i> Profile</a>
    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
</div>

<div class="container" style="margin-top:70px">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

            <?php
            $id = $_GET['id'];
            $category_id = 0;
            $sql = "SELECT * FROM `video` where video_id =$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $video_path = "video/" . $row["video_path"];
                    $video_ext = $row["video_ext"];
                    $video_id = $row['video_id'];
                    $caption = $row['caption'];
                    $description = $row['description'];
                    $category_id = $row['category_id'];
                    ?>
                    <div class="col-md-12">
                        <video controls autoplay style="width:100%" controlsList="nodownload">
                            <source src="<?php echo $video_path ?>" type="video/<?php echo $video_ext ?>">
                        </video>
                        <br>
                        <h3><strong><?php echo $caption ?></strong></h3>

                        <form method="post" action="video.php?id=<?php echo $id ?>">
                            <input type="hidden" name="video_id" value="<?php echo $video_id ?>">
                            <input type="submit" name="playlist" class="btn btn-primary btn-sm pull-right"
                                   value="Add to playlist">
                        </form>
                        <br>
                        <legend><h3>Desciption</h3></legend>
                        <p><?php echo $description ?></p>
                        <br>
                        <div class="well">
                            <form action="video.php?id=<?php echo $id ?>" method="post">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <input type="hidden" name="video_id" value="<?php echo $video_id ?>">
                                    <textarea class="form-control" rows="5" id="comment" name="comment"
                                              placeholder="Write Your Comment"></textarea>
                                </div>
                                <input type="submit" name="submit_comment" class="btn btn-primary pull-right"
                                       value="submit">
                            </form>
                            <br>
                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
                                <img class="mr-3" src="image/steve.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h6 class="mb-0 text-white lh-100">All Comments</h6>
                                    <small>On this video</small>
                                </div>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $comment_sql = "SELECT userinfo.username, comment.comment ,comment.comment_id FROM userinfo
                            INNER JOIN comment ON userinfo.userinfo_id = comment.user_id where comment.video_id = $id";
                            $result_comment = $conn->query($comment_sql);
                            if ($result_comment->num_rows > 0) {
                                ?>
                                <div class="my-3 p-3 bg-white rounded box-shadow">
                                    <h6 class="border-bottom border-gray pb-2 mb-0">Comment List</h6>
                                    <?php
                                    while ($row_comment = $result_comment->fetch_assoc()) {
                                        ?>
                                        <div class="media text-muted pt-3">
                                            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1"
                                                 alt="" class="mr-2 rounded">
                                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                <strong class="d-block text-gray-dark"><?= $row_comment['username'] ?></strong>
                                                <?= $row_comment['comment'] ?>
                                            <div class="media-right">
                                                <?php
                                                if ($_SESSION["user_type"] == 0 || $_SESSION["username"] == $row_comment['username']) {
                                                    ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="commentid"
                                                               value="<?php echo $row_comment['comment_id'] ?>">
                                                        <input type="submit" name="submit" class="btn btn-danger btn-sm"
                                                               value="delete">
                                                    </form>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            </p>

                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="media text-muted pt-3">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">No Comments</strong>

                                    </p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>

                    <?php
                }
            }
            ?>


        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <?php
            $suggested_video = "SELECT * FROM `video` where category_id =$category_id";
            $result_suggested_video = $conn->query($suggested_video);
            if ($result_suggested_video->num_rows > 0) {
                while ($row_result = $result_suggested_video->fetch_assoc()) {
                    $video_path = "video/" . $row_result["video_path"];
                    $thumbnail_path = "video/" . $row_result['thumbnail_path'];
                    $video_ext = $row_result["video_ext"];
                    $video_id = $row_result['video_id'];
                    $caption = $row_result['caption'];
                    $description = $row_result['description'];
                    ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="thumbnail">
                                <a href="video.php?id=<?php echo $video_id ?>">
                                    <img src="<?php echo $thumbnail_path ?>" style="width:100%!important; height:100px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <span><strong><?php echo $caption ?></strong></span>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>

<footer class="container-fluid text-center">

    <p>CopyRight © 2019 TutorialNow All Rights Reserved</p>
</footer>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/popper/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function playVideo(x) {
        window.location = 'video.php?id=' + x;
    }
</script>
</body>
</html>
