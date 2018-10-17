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
                    url: "deleteEmployee",
                    type: "POST",
                    data: {id: id},
                    success: function(result) {
                        if (result === 'success') {
                            $("#emp_"+id).remove();
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
                <a href="<?= base_url();?>Employee/addEmployee" class="btn btn-primary">Add Employee</a>
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
                                echo "<tr id='emp_".$employee['empId']."'>
                                    <td>".$i."</td>
                                    <td><img src='".base_url().$employee['empImgPath']."' width='50px'></td>
                                    <td>".$employee['empName']."</td>
                                    <td>".$employee['empEmail']."</td>
                                    <td>".$employee['empDob']."</td>
                                    <td>".$employee['empGender']."</td>
                                    <td>
                                        <button type='button' class='btn btn-info' data-toggle='modal' data-target='#updateModal'>Update</button>
                                        <button type='button' class='btn btn-info' onclick='deleteEmployee(".$employee['empId'].")'>Delete</button>
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
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>