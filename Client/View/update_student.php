<legend align="center"><h1>Update Student</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" enctype="multipart/form-data">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">NRP</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $student->status->id?>" type="text" name="txtId" placeholder="NRP" required disabled>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $student->status->name?>" type="text" name="txtName" placeholder="Name" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $student->status->email?>" type="email" name="txtEmail" placeholder="Email" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Address</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $student->status->address?>" type="text" name="txtAddress" placeholder="Address" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $student->status->phone?>" type="text" name="txtPhone" placeholder="Phone Number"
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
                        <input style="width: 100%" type="password" name="txtConfPass">
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

                    <input type="submit" value="Update Student" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>