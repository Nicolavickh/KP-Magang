<legend align="center"><h1>Update Stages</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Stage</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%;" type="text" name="txtName" value="<?php echo $stage->status->name ?>" required></br>
                    </div>
                    <input type="submit" value="Update Stage" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>