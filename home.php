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
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="navbar-brand" href="index.html">
            <i class="fas fa-graduation-cap"></i>
            TutorialNow
        </a>
    </h5>

    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Test Link 1</a>
        <a class="p-2 text-dark" href="#">Link 2</a>
        <a class="p-2 text-dark" href="#">Link 3</a>
        <a class="p-2 text-dark" href="#">Link 3</a>
    </nav>
    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
</div>

<div class="container">
    <form action="#" class="form-inline" method="post">
        <div class="form-group">
            <label for="email">Search by name</label>
            <input type="text" class="form-control" placeholder="Search"
                   name="search">
        </div>
        <div class="form-group">
            <label for="duration">Filter by Duration</label>
            <select class="form-control" name="duration">
                <option value="1-5">1-5</option>
                <option value="5-10">5-10</option>
                <option value="10+">10+</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i>
        </button>
    </form>
    <br>
</div>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active carousel-item">
                <img src="image/t.jpeg" alt="Albert Einstein" style="width:1200px; height:470px">
            </div>
            <div class="item carousel-item">
                <img src="image/steve.png" alt="ambrosebierce1" style="width:1200px; height:470px">
            </div>
            <div class="item carousel-item">
                <img src="image/engineering.jpg" alt="man_computer" style="width:1200px; height:470px">
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">

            <span class="glyphicon glyphicon-chevron-left"></span>

            <span class="sr-only">Previous</span>

        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">

            <span class="glyphicon glyphicon-chevron-right"></span>

            <span class="sr-only">Next</span>

        </a>
    </div>
    <br>
</div>

<div class="container">
    <div class="container outerpadding">

        <div class="row">

            <legend>Dummy Category 1 <span class="pull-right"><a href="#">...more</a></span></legend>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/engineering.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 1</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="row">

            <legend>Dummy Category 2 <span class="pull-right"><a href="#">...more</a></span></legend>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                <div class="thumbnail">
                    <a href="#">
                        <img src="image/ocean.jpg" style="width:100%!important; height:200px">
                        <div class="caption">
                            <p>Dummy Caption 2</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="about" class="container text-center" style="color: #000000; height: 400px; background-color: #C0C0C0;">
    <h1>TutorialNow.com</h1>
    <pre>TutorialNow.com is a learning website where viewers are mastering new skills and achieving heir goals.</pre>
    <pre>This site will provide a good amount of video tutorials in various sectors of education.</pre>
</div>

<div id="contact" class="container bg-grey">
    <h3 class="text-center">Contact</h3>

    <div class="row">
        <div class="col-md-4" style="color: white;">
            <p><span class="glyphicon glyphicon-map-marker"></span>Dhaka , Bangladesh</p>
            <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 0000000</p>
            <p><span class="glyphicon glyphicon-envelope"></span>Email: TutorialNow@gmail.com</p>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Enter Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
            <br>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button class="btn pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">

    <p>CopyRight © 2019 Digital All Rights Reserved</p>
</footer>

<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
</body>
</html>
