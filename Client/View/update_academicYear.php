<legend align="center"><h1>Update Academic Year</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Year</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" value="<?php echo $year->status->year?>" name="txtYear" placeholder="Academic Year" required>
                    </div>
                    <input type="submit" value="Update Academic Year" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>