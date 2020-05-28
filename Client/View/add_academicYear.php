<?php if ($_SESSION['role'] == 'admin') { ?>
    <legend align="center"><h1>Academic Years Management</h1></legend>
    <div align="center">
        <div align="left" class="card shadow mb-4 w-50">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Year</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtYear" placeholder="Academic Year" required>
                        </div>
                        <input type="submit" value="Add Academic Year" name="btnAdd">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<h1 class="h3 mb-2 text-gray-800">Academic Years</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Year</th>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $years Academic_year */
                foreach ($dataYear as $years) {
                    echo '<tr>';
                    echo '<td>' . $years->id . '</td>';
                    echo '<td>' . $years->year . '</td>';
                    if ($_SESSION['role'] == 'admin') {
                        echo '<td><button onclick="updateAcademicYear(' . $years->id . ')">Update</button> </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>