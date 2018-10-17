<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?= base_url(); ?>assets/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url(); ?>assets/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/bootstrap.min.js" type="text/javascript"></script>
        <title>Add New Employee</title>
    </head>
    <body>
        <div class="container">
            <h1>Enter Employee details</h1>
            <form method="post" action="<?= base_url();?>/Employee/addEmployee" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="mail" name="mail" class="form-control" id="mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label for="rpassword">Re-type Password:</label>
                    <input type="password" name="rpassword" class="form-control" id="rpassword" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" class="form-control" id="dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">Profile Image:</label>
                    <input type="file" name="profileImage" class="form-control" id="img" required>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </body>
</html>