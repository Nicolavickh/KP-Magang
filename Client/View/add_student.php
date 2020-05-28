<?php if ($_SESSION['role'] == 'admin') { ?>
    <legend align="center"><h1>Students Management</h1></legend>
    <div align="center">
        <div align="left" class="card shadow mb-4 w-50">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NRP</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtId" placeholder="NRP" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtName" placeholder="Name" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="email" name="txtEmail" placeholder="Email" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Address</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtAddress" placeholder="Address" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtPhone" placeholder="Phone Number"
                                   required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Login Password</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="password" name="txtPassword" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Confirm Password</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="password" name="txtConfPass" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" name="txtPhoto">
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CV</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" name="txtCv">
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transcript</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" name="txtTranscript">
                        </div>

                        <input type="submit" value="Add Student" name="btnAdd">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<h1 class="h3 mb-2 text-gray-800">Students</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>NRP</th>
                    <th>Name</th>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Action</th>
                    <?php } else {
                        echo '<th>Email</th>';
                        echo '<th>Address</th>';
                        echo '<th>Photo</th>';
                    } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $students Student */
                foreach ($dataStudent as $students) {
                    echo '<tr>';
                    echo '<td>' . $students->id . '</td>';
                    echo '<td>' . $students->name . '</td>';
                    if ($_SESSION['role'] == 'admin') {
                        echo '<td><button onclick="updateStudent(' . $students->id . ')">Update</button> </td>';
                    } else {
                        echo '<td>' . $students->email . '</td>';
                        echo '<td>' . $students->address . '</td>';
                        if ($students->photo != null and file_exists($students->photo)) {
                            echo '<td><img width = "113px" height= "151px" src="' . $students->photo . '"></td>';
                        } else {
                            echo '<td>Photo Not Available</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>