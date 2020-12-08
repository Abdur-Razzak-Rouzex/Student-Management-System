<h1 class="text-primary text-center"><i class="fa fa-users"></i> All Users</small></h1>
<ol class="breadcrumb">
    <!-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li> -->
</ol>


<div class="table-responsive">
    <table id="data" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $db_stdinfo = mysqli_query($link, "SELECT * FROM `users` ");
            while ($row = mysqli_fetch_assoc($db_stdinfo)) { ?>
                <tr>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><img style="width: 100px;" src="images/<?php echo $row['photo']; ?>" alt=""></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>