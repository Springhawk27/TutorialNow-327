<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: login.php');
}else{
  if($_SESSION["username"] != "admin")
  {
    header('Location: home.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TutorialNow | Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<script>
  $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<style>
.navbar {
   background-color: #2F4F4F;
}

 .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 ;
  }

  .navbar .navbar-nav li a {
    color: #F8F8F8 ;
  }

  .navbar li a, .navbar .navbar-brand:hover { 
      color: #FFFF00 ;
  }

    .navbar .navbar-nav li a:hover {
    color: #F8F8F8;
  }
 
  .carousel{
    margin-top: 0px;
    margin-bottom: 0px;
     padding-top: 0px;
     padding-bottom: 0px;
  }

.dropdown-menu li a{
 color: black !important;
}
.container{
  margin-top: 100px;
}
</style>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">TutorialNow</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["username"] ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin.php">Profile</a></li>
          <li><a href="logout.php">Log Out</a></li>
          </ul>
      </li>
    </ul>
    </div>
  </div>
</nav>

<div class="container">
    <a href="admin_userview.php" type="button" class="btn btn-primary btn-lg btn-block">View All Users</a>
    <a href="adminform.php" type="button" class="btn btn-primary btn-lg btn-block">Upload Video</a>
    <a href="admin_videoview.php" type="button" class="btn btn-primary btn-lg btn-block">View Video</a>
    <a href="category.php" type="button" class="btn btn-primary btn-lg btn-block">Add Category</a>
</div>
 
</body>
</html>




