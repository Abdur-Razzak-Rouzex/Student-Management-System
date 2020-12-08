<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small> My Profile</small></h1>
<br>

<?php

// Fetching logged in user data
$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tr>
                <td>User ID</td>
                <td><?= $user_row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $user_row['name']; ?></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><?= $user_row['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $user_row['signin_date']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>Active</td>
            </tr>
        </table>
        <a href="" class="btn btn-sm btn-info pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6 text-center">
        <a href="">
            <img width="50%" class="img-thumbnail" src="images/<?= $user_row['photo'] ?>" alt="">
        </a>
        <br>
        <br>


        <?Php

        $photo = explode('.', $_FILES['photo']['name']);
        $photo = end($photo);
        $photo_name = $session_user . '.' . $photo;

        $upload = mysqli_query($link, "UPDATE `users` SET `photo`= '$photo_name' WHERE `username`= '$session_user'");
        if($upload){
            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
        }

        ?>


        <form action="" enctype="multipart/form-data" method="POST">
            <label for="photo">
                <h3 class="text-primary">Profile Picture</h3>
            </label>
            <input type="file" name="photo" id="photo"><br>
            <input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
        </form>
    </div>
</div>