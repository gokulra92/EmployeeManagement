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
        <script>
            function deleteEmployee(id) {
                if (id === "") {
                    return;
                }
                $.ajax({
                    url: "<?= base_url() ?>Employee/deleteEmployee",
                    type: "POST",
                    data: {id: id},
                    success: function (result) {
                        if (result === 'success') {
                            $("#emp_" + id).remove();
                        } else {
                            alert('Failed to delete thos employee');
                        }
                    }
                });
            }
            function getEmployee(id) {
                if (id === "") {
                    return;
                }
                $.ajax({
                    url: "<?= base_url() ?>Employee/getEmployee",
                    type: "POST",
                    data: {id: id},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $('#empId').val('');
                        $('#name').val('');
                        $('#mail').val('');
                        $('#dob').val('');
                        $('#gender').val('');
                        if (result) {
                            $('#empId').val(result.empId);
                            $('#name').val(result.empName);
                            $('#mail').val(result.empEmail);
                            $('#dob').val(result.empDob);
                            $('#gender').val(result.empGender);
                            $('#updateModal').modal('show');
                        } else {
                            alert('Failed to delete thos employee');
                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="pull-right" style="margin-top: 10px;">
                <a href="<?= base_url(); ?>Employee/addEmployee" class="btn btn-primary">Add Employee</a>
            </div>
            <h1>Employees list</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($employees) > 0) {
                            $i = 1;
                            foreach ($employees as $employee) {
                                $img = base_url() . $employee['empImgPath'];
                                if (empty($employee['empImgPath']) || !@getimagesize($img)) {
                                    $img = base_url() . '/assets/default.jpg';
                                }
                                $gender = ($employee['empGender']) ? 'Male' : 'Female';
                                echo "<tr id='emp_" . $employee['empId'] . "'>
                                    <td>" . $i . "</td>
                                    <td><img src='" . $img . "' style='width: 50px; height: auto;'></td>
                                    <td>" . $employee['empName'] . "</td>
                                    <td>" . $employee['empEmail'] . "</td>
                                    <td>" . $employee['empDob'] . "</td>
                                    <td>" . $gender . "</td>
                                    <td>
                                        <button type='button' class='btn btn-info' onclick='getEmployee(" . $employee['empId'] . ")'>Update</button>
                                        <button type='button' class='btn btn-info' onclick='deleteEmployee(" . $employee['empId'] . ")'>Delete</button>
                                    </td>
                                </tr>";
                                $i++;
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
        <div id="updateModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update details</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url(); ?>/Employee/addEmployee" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name" value="" required>
                                <input type="hidden" name="empId" class="form-control" id="empId" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="mail">Email:</label>
                                <input type="mail" name="mail" class="form-control" value="" id="mail" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" name="dob" class="form-control" value="" id="dob" required>
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
                                <input type="file" name="profileImage" class="form-control" id="img">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>