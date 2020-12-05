<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Management System</title>
</head>

<body>
    <div class="container">
        <br>
        <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
        <br>
        <br>
        <h1 class="text-center">Welcome to Student Management System</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="" method="POST">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2" class="text-center"><label>Student Informations</label></td>
                </tr>
                <tr>
                    <td><label for="choose">Choose Class</label></td>
                    <td>
                        <select class="form-control" name="choose" id="choose">
                            <option value="">Select</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="roll">Roll</label></td>
                    <td><input class="form-control" type="text" name="roll" pattern="[0-9]{2}" placeholder="Roll"></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2"><input class="btn btn-default" type="submit" value="Show Info" name="show_info"></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>