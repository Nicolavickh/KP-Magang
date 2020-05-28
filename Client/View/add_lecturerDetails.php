<?php if ($_SESSION['role']=='admin'){ ?>
    <legend align="center"><h1>Lecturer Details Management</h1></legend>
    <div align="center">
        <div align="left" class="card shadow mb-4 w-50">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NIK - Name</h6>
                        </div>
                        <div class="card-body">
                            <select style="width: 100%"name="txtLecturerId">
                                <option selected></option>
                                <?php
                                /* @var $lecturers Lecturer */
                                foreach ($dataLecturer as $lecturers) {
                                    echo '<option value = "' . $lecturers->id . '">' . $lecturers->id . ' - ' . $lecturers->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Role</h6>
                        </div>
                        <div class="card-body">
                            <select style="width: 100%"name="txtRoleId">
                                <option selected></option>
                                <?php
                                /* @var $roles Role */
                                foreach ($dataRole as $roles) {
                                    echo '<option value = "' . $roles->id . '">' . $roles->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Academic Year</h6>
                        </div>
                        <div class="card-body">
                            <select style="width: 100%"name="txtYearId">
                                <option selected></option>
                                <?php
                                /* @var $years Academic_year */
                                foreach ($dataAcademicYear as $years) {
                                    echo '<option value = "' . $years->id . '">' . $years->year . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Semester</h6>
                        </div>
                        <div class="card-body">
                            <select style="width: 100%"name="txtSemesterId">
                                <option selected></option>
                                <?php
                                /* @var $semesters Semester */
                                foreach ($dataSemester as $semesters) {
                                    echo '<option value = "' . $semesters->id . '">' . $semesters->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" name="btnAdd" value="Add Lecturer Details">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<h1 class="h3 mb-2 text-gray-800">Lecturers Details</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
    <thead>
    <tr>
        <th>NIK</th>
        <th>Name</th>
        <th>Role</th>
        <th>Academic Year</th>
        <th>Semester</th>
        <th>Status</th>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <th>Action</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $details Lecturer_details */
    foreach ($dataDetails as $details) {
        echo '<tr>';
        echo '<td>' . $details->lecturer->id . '</td>';
        echo '<td>' . $details->lecturer->name . '</td>';
        echo '<td>' . $details->role->name . '</td>';
        echo '<td>' . $details->academic_year->year . '</td>';
        echo '<td>' . $details->semester->name . '</td>';
        if ($details->status == 1) {
            echo '<td> Active </td>';
            if ($_SESSION['role'] == 'admin') {
                echo '<td><button onclick="lectDetUpdate(' . $details->lecturer->id . ',' . $details->role->id . ',' . $details->semester->id . ',' . $details->academic_year->id . ',' . 0 . ')">Deactivate</button> </td>';
            }
        } else {
            echo '<td> Not Active</td>';
            if ($_SESSION['role'] == 'admin') {
                echo '<td><button onclick="lectDetUpdate(' . $details->lecturer->id . ',' . $details->role->id . ',' . $details->semester->id . ',' . $details->academic_year->id . ',' . 1 . ')">Activate</button> </td>';
            }
        }
        echo '</tr>';
    }
    ?>
    </tbody>
</table>