<legend align="center"><h1>Update Profile</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if ($_SESSION['role'] == 'student') {
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NRP</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->id ?>" type="text" name="txtId"
                                   placeholder="NRP" disabled>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                        </div>
                        <div class="card-body"><input style="width: 100%" value="<?php echo $user->status->name ?>"  type="text"
                                   name="txtName" placeholder="Name" disabled>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->email ?>" type="email"
                                   name="txtEmail" placeholder="Email" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Address</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->address ?>" type="text"
                                   name="txtAddress" placeholder="Address" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->phone ?>" type="text"
                                   name="txtPhone" placeholder="Phone Number"
                                   required>
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
                    <?php
                } else if ($_SESSION['role'] == 'company') { ?>
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Name</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $user->status->name ?>" type="text"
                               name="txtName" placeholder="Company Name" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Address</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $user->status->address ?>" type="text"
                               name="txtAddress" placeholder="Company Address"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Email</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $user->status->email ?>" type="email"
                               name="txtEmail" placeholder="Contact Person Email"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $user->status->phone ?>" type="text"
                               name="txtPhone" placeholder="Contact Person Phone Number"
                               required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Username</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" value="<?php echo $user->status->username ?>" type="text"
                               name="txtUsername" placeholder="Username"
                               required>
                    </div>
                    <?php
                    } else { ?>

                    <form method="post">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NIK</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->id ?>" disabled type="text"
                                   name="txtId" placeholder="NIK" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->name ?>" type="text"
                                   name="txtName" placeholder="Name" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->email ?>" type="email"
                                   name="txtEmail" placeholder="Email" required>
                        </div>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                        </div>
                        <div class="card-body">
                            <input style="width: 100%" value="<?php echo $user->status->phone ?>" type="text"
                                   name="txtPhone" placeholder="Phone Number"
                                   required>
                        </div>
                        <?php
                        }
                        ?>
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

                        <input type="submit" value="Update Profile" name="btnUpdateProfile">
                    </form>
            </div>
        </div>
    </div>
</div>
