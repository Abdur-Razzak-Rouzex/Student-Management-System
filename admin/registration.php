<?php
require_once './dbconnection.php';

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username . '.' . $photo;

    if ($password == $cpassword) {
        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email'; ");
        if (mysqli_num_rows($email_check) == 0) {
            $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'; ");
            if (mysqli_num_rows($username_check) == 0){
            }else{
                phpAlert("User name already exists");
            }
        } else {
            phpAlert("Email already exists");
        }
    } else {
        phpAlert("password didn't match");
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Welcome to Student Management System</h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center">User Registration Form</h2>
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" id="" class="form-control" required value="<?php if (isset($name)) {
                                                                                                                                                echo $name;
                                                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email" id="" class="form-control" required value="<?php if (isset($email)) {
                                                                                                                                                    echo $email;
                                                                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" id="username" name="username" placeholder="Enter your user name" id="" class="form-control" required value="<?php if (isset($username)) {
                                                                                                                                                            echo $username;
                                                                                                                                                        } ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" id="" class="form-control" required value="<?php if (isset($password)) {
                                                                                                                                                                echo $password;
                                                                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Your Password" id="" class="form-control" required value="<?php if (isset($cpassword)) {
                                                                                                                                                                    echo $cpassword;
                                                                                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input id="photo" name="photo" type="file" required>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <input type="submit" name="registration" value="Register" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
        <p><b>Already Have an Account?</b> <a href="login.php">Login</a></p>
        <footer>
            <p><i class="fa fa-copyright" aria-hidden="true">Copyright &copy; 2020 - <?= date('Y') ?> All Rights Reserved.</i></p>
        </footer>
    </div>
</body>

</html>