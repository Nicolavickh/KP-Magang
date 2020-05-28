<legend align="center"><h1>Companies Management</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Name</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtName" placeholder="Company Name" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Address</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtAddress" placeholder="Company Address"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Email</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="email" name="txtEmail" placeholder="Contact Person Email"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtPhone" placeholder="Contact Person Phone Number"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Username</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtUsername" placeholder="Username"
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
                    <input type="submit" value="Add Company" name="btnAdd">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800">Companies</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $companies Company */
                foreach ($dataCompany as $companies) {
                    echo '<tr>';
                    echo '<td>' . $companies->id . '</td>';
                    echo '<td>' . $companies->name . '</td>';
                    echo '<td><button onclick="updateCompany(' . $companies->id . ')">Update</button> </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>