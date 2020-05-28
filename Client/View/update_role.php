<legend align="center"><h1>Update Role</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Role</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" value="<?php echo $role->status->name?>" name="txtName" placeholder="Role" required>
                    </div>
                    <input type="submit" value="Update Role" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>