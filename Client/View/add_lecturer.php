<?php if ($_SESSION['role'] == 'admin') { ?>
    <legend align="center"><h1>Lecturers Management</h1></legend>
    <div align="center">
        <div align="left" class="card shadow mb-4 w-50">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NIK</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtId" placeholder="NIK" required>
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
                            <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtPhone" placeholder="Phone Number"
                                   required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Password</h6>
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
                        <input type="submit" value="Add Lecturer" name="btnAdd">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<h1 class="h3 mb-2 text-gray-800">Lecturers</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $lecturers Lecturer */
                foreach ($dataLecturer as $lecturers) {
                    echo '<tr>';
                    echo '<td>' . $lecturers->id . '</td>';
                    echo '<td>' . $lecturers->name . '</td>';
                    echo '<td>' . $lecturers->email . '</td>';
                    echo '<td>' . $lecturers->phone . '</td>';
                    if ($_SESSION['role'] == 'admin') {
                        echo '<td><button onclick="updateLecturer(' . $lecturers->id . ')">Update</button> </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>