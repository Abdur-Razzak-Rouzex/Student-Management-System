<!-- Header, Side bar, Footer -->

<?php
session_start();
require_once './dbconnection.php';

if (!isset($_SESSION['user_login'])) {
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../datatable/css/bootstrap.min.css" rel="stylesheet">
    <link href="../datatable/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript" src="../datatable/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../datatable/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../datatable/js/scripts.js"></script>

    <title>admin</title>
</head>

<body>
    <!-- Header Part Start -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">SMS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-user"></i> Welcome: Rouzex</a></li>
                    <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add User</a></li>
                    <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Header part ends -->
    
    <!-- Left side bar starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
                    <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
                    <a href="index.php?page=all-student" class="list-group-item"><i class="fa fa-users"></i> All Student</a>
                    <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users </a>
                    <!-- <a href="index.php?page=update_student" class="list-group-item hidden"></a> -->
                </div>
            </div>
            <div class="col-sm-9" style="min-height: 500px;">
                <?php 
                    if(isset($_GET['page'])){
                        $page = $_GET['page'].'.php';
                    }else{
                        $page = 'dashboard.php';
                    }
                    if(file_exists($page)){
                        require_once $page;
                    }else{
                        require_once './404.php';
                    }                 
                ?>
            </div>
        </div>
    </div>
    <!-- Left side bar ends -->

    <!-- Footer starts -->
    <footer style="background:#3CA9E8; text-align:center; padding: 20px 0; color: #fff; margin-top: 20px;">
        <p style="margin: 0">Copyright &COPY; 2020 Studnet Management System. All Rights Are Reserved.</p>
    </footer>
    <!-- Footer ends -->

</body>

</html>