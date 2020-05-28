<legend align="center"><h1>Update Company</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Name</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $company->status->name ?>" type="text" name="txtName" placeholder="Company Name" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Address</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $company->status->address ?>" type="text" name="txtAddress" placeholder="Company Address"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Email</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $company->status->email ?>" type="email" name="txtEmail" placeholder="Contact Person Email"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $company->status->phone ?>" type="text" name="txtPhone" placeholder="Contact Person Phone Number"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Username</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $company->status->username ?>" type="text" name="txtUsername" placeholder="Username"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Login Password</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="password" name="txtPassword">
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Confirm Password</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%"  type="password" name="txtConfPass">
                    </div>
                    <input type="submit" value="Update Company" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>