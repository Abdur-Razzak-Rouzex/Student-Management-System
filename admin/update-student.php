<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student</small></h1>
<ol class="breadcrumb">
    <!-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li> -->
</ol>

<?php

$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = '$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];

    $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`p_contact`='$pcontact' WHERE `id` = '$id'";
    $result = mysqli_query($link, $query);

    if($result){
        header('location: index.php?page=all-student');
    }
}

?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Student Name" required value="<?= $db_row['name']; ?>">
        </div>
        <div class="form-group">
            <label for="roll">Student Roll</label>
            <input type="text" name="roll" id="roll" class="form-control" placeholder="6 digit roll" pattern="[0-9]{6}" required value="<?= $db_row['roll']; ?>">
        </div>
        <div class="form-group">
            <label for="pcontact">Parents Contact Numer</label>
            <input type="text" name="pcontact" id="pcontact" class="form-control" placeholder="01*********" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required value="<?= $db_row['p_contact']; ?>">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="City" required value="<?= $db_row['city']; ?>">
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <select name="class" id="class" class="form-control">
                <option value="">Select</option>
                <option value="1st">One</option>
                <option value="2nd">Two</option>
                <option value="3rd">Three</option>
                <option value="4th">Four</option>
                <option value="5th">Five</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="update-student" value="Update Student" class="btn btn-primary pull-right">
        </div>
        </form>
    </div>
</div>
