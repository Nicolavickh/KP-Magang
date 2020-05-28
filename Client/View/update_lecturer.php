<legend align="center"><h1>Update Lecturer</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">NIK</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $lecturer->status->id?>" disabled type="text" name="txtId" placeholder="NIK" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $lecturer->status->name?>" type="text" name="txtName" placeholder="Name" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $lecturer->status->email?>" type="email" name="txtEmail" placeholder="Email" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $lecturer->status->phone?>" type="text" name="txtPhone" placeholder="Phone Number"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Password</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="password" name="txtPassword">
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Confirm Password</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="password" name="txtConfPass">
                    </div>
                    <input type="submit" value="Update Lecturer" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>