<h1 class="text-primary text-center"><i class="fa fa-users"></i> All Students</small></h1>
<ol class="breadcrumb">
    <!-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li> -->
</ol>


<div class="table-responsive">
    <table id="data" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>City</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $db_stdinfo = mysqli_query($link, "SELECT * FROM `student_info` ");
            while ($row = mysqli_fetch_assoc($db_stdinfo)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td><?php echo $row['roll']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo ucwords($row['city']); ?></td>
                    <td><?php echo $row['p_contact']; ?></td>
                    <td><img style="width: 100px;" src="std_img/<?php echo $row['photo']; ?>" alt=""></td>
                    <td>
                        <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> Edit </i></a>
                        &nbsp;&nbsp;
                        <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"> Delete</i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>