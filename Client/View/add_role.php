<?php if ($_SESSION['role'] == 'admin') { ?>
    <legend align="center"><h1>Roles Management</h1></legend>
    <div align="center">
        <div align="left" class="card shadow mb-4 w-50">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Role</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" type="text" name="txtName" placeholder="Role" required>
                        </div>
                        <input type="submit" value="Add Role" name="btnAdd">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<h1 class="h3 mb-2 text-gray-800">Roles</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $roles Role */
                foreach ($dataRole as $roles) {
                    echo '<tr>';
                    echo '<td>' . $roles->id . '</td>';
                    echo '<td>' . $roles->name . '</td>';
                    if ($_SESSION['role'] == 'admin') {
                        echo '<td><button onclick="updateRole(' . $roles->id . ')">Update</button> </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>