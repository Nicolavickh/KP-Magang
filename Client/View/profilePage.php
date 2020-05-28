<legend align="center"><h1>Profile</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4" style="width: 60% !important;">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if ($_SESSION['role'] == 'student') {
                    ?>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($user->status->photo != null and file_exists($user->status->photo)) {
                            ?>
                            <img src="<?php echo $user->status->photo ?>" width="113px" height="151px">
                        <?php } else { ?>
                            No Photo Avalable
                        <?php } ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->name ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Address</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->address ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->email ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->phone ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">CV</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($user->status->cv != null and file_exists($user->status->cv)) {
                            ?>
                            <a href="<?php echo $user->status->cv ?>">Download CV</a>
                        <?php } else { ?>
                            No CV Avalable
                        <?php } ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Transcript</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($user->status->transcript != null and file_exists($user->status->transcript)) {
                            ?>
                            <a href="<?php echo $user->status->transcript ?>">Download Transcript</a>
                        <?php } else { ?>
                            No Transcript Avalable
                        <?php } ?>
                    </div>
                    <a href="?menu=profileUpdate">Update Profile <i class="fa fa-edit"></i></a>

                    <?php
                } else if ($_SESSION['role'] == 'company') {
                    ?>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Name</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->name ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company Address</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->address ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Email</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->email ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Person Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->phone ?>
                    </div>
                    <a href="?menu=profileUpdate">Update Profile <i class="fa fa-edit"></i></a>

                <?php } else if ($_SESSION['role']=='admin'){ ?>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ADMIN</h6>
                    </div>
                    <div class="card-body">
                        ADMIN PROFILE DOES NOT EXIST
                    </div>
                <?php } else { ?>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->name ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->email ?>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Phone Number</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $user->status->phone ?>
                    </div>
                    <a href="?menu=profileUpdate">Update Profile <i class="fa fa-edit"></i></a>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
