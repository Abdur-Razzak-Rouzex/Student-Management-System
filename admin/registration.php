<?php
require_once './dbconnection.php';
session_start();


if (isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username . '.' . $photo;

    $input_error = array();
    if (empty($name)) {
        $input_error['name'] = "The name field is required";
    }
    if (empty($email)) {
        $input_error['email'] = "The email field is required";
    }

    if (empty($username)) {
        $input_error['username'] = "The username field is required";
    }

    if (empty($password)) {
        $input_error['password'] = "The password field is required";
    }

    if (empty($cpassword)) {
        $input_error['cpassword'] = "The confirm password field is required";
    }

    if (count($input_error) == 0) {
        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email'; ");
        if (mysqli_num_rows($email_check) == 0) {
            $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'; ");
            if (mysqli_num_rows($username_check) == 0) {
                if (strlen($password) > 7) {
                    if ($password == $cpassword) {
                        $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name', '$email', '$username', '$password', '$photo_name', 'inactive')";
                        $result = mysqli_query($link, $query);
                        if ($result) {
                            $_SESSION['data_insert_success'] = "Data Inserted Successfully";
                            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
                            header('location: login.php');
                        } else {
                            $_SESSION['data_insert_error'] = "Data Insert error";
                        }
                    } else {
                        $password_match = "Password didn't match";
                    }
                } else {
                    $password_len = "Password should be atleast 8 characters";
                }
            } else {
                $username_error = "User name already exists";
            }
        } else {
            $email_error = "The email address already exists";
        }
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
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Welcome to Student Management System</h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center">User Registration Form</h2>
                <!-- <?php if (isset($_SESSION['data_insert_success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['data_insert_success'] . '</div>';
                }; ?> -->
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" id="" class="form-control" value="<?php if (isset($name)) {
                                                                                                                                        echo $name;
                                                                                                                                    } ?>">
                        <label class="error"><?php if (isset($input_error['name'])) {
                                                    echo $input_error['name'];
                                                }; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email" id="" class="form-control" value="<?php if (isset($email)) {
                                                                                                                                        echo $email;
                                                                                                                                    } ?>">
                        <label class="error"><?php if (isset($input_error['email'])) {
                                                    echo $input_error['email'];
                                                } ?></label>
                        <label class="error"><?php if (isset($email_error)) {
                                                    echo $email_error;
                                                }; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" id="username" name="username" placeholder="Enter your user name" id="" class="form-control" value="<?php if (isset($username)) {
                                                                                                                                                    echo $username;
                                                                                                                                                } ?>">
                        <label class="error"><?php if (isset($input_error['username'])) {
                                                    echo $input_error['username'];
                                                } ?></label>
                        <label class="error"><?php if (isset($username_error)) {
                                                    echo $username_error;
                                                }; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" id="" class="form-control" value="<?php if (isset($password)) {
                                                                                                                                                        echo $password;
                                                                                                                                                    } ?>">
                        <label class="error"><?php if (isset($input_error['password'])) {
                                                    echo $input_error['password'];
                                                } ?></label>
                        <label class="error"><?php if (isset($password_len)) {
                                                    echo $password_len;
                                                }; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Your Password" id="" class="form-control" value="<?php if (isset($cpassword)) {
                                                                                                                                                            echo $cpassword;
                                                                                                                                                        } ?>">
                        <label class="error"><?php if (isset($input_error['cpassword'])) {
                                                    echo $input_error['cpassword'];
                                                } ?></label>
                        <label class="error"><?php if (isset($password_match)) {
                                                    echo $password_match;
                                                }; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input id="photo" name="photo" type="file">
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <input type="submit" name="registration" value="Register" class="btn btn-primary">
                    </div>
                </form>
                <a href="../home.php"><input type="submit" value="Back" class="btn btn-info pull-right"></a>
            </div>
        </div>
        <div>
            <p><b>Already Have an Account?</b> <a href="login.php">Login</a></p>
        </div>
        <footer>
            <p><i class="fa fa-copyright" aria-hidden="true">Copyright &copy; 2020 - <?= date('Y') ?> All Rights Reserved.</i></p>
        </footer>
    </div>
</body>

</html>