<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: login.php');
} else {
    if ($_SESSION["username"] != "admin") {
        header('Location: admin-dashboard.php');
    }
}
require_once 'connection.php';
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
