<?php
require_once './dbconnection.php';

session_start();

if (isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'");
    if (mysqli_num_rows($username_check) > 0) {
        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == $password) {
            $_SESSION['user_login'] = $username;
            header('location: index.php');
        } else {
            $username_not_found = "Wrong username or password";
        }
    } else {
        $username_not_found = "Wrong username or password";
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
    <title>Login</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h1 class="text-center">Welcome to Student Management System</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center">Admin Login Form</h2>
                <form action="" method="POST">
                    <div>
                        <input type="text" placeholder="User Name" name="username" required class="form-control" value="<?php if (isset($username)) {
                                                                                                                            echo $username;
                                                                                                                        } ?>">
                    </div>
                    <br>
                    <div>
                        <input type="password" placeholder="Password" name="password" required class="form-control" value="<?php if (isset($password)) {
                                                                                                                                echo $password;
                                                                                                                            } ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="login" name="login" class="btn btn-info pull-right">
                    </div>
                </form>
                <a href="../home.php"><input type="submit" value="Back" class="btn btn-info"></a>
            </div>
        </div>
        <br>
        <?php if (isset($username_not_found)) {
            echo '<div class="alert alert-danger col-md-4 col-md-offset-4">' . $username_not_found . '</div>';
        }; ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <p><b>Don't have an Account? </b> <a href="registration.php">Register Here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>