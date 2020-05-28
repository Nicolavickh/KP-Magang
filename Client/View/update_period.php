<legend align="center"><h1>Periods Management</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Period</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtName" value="<?php echo $period->status->name ?>" required></br>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                    </div>
                    <div class="card-body">
                        <select style="width: 100%" name="txtStatus">
                            <?php
                            if ($period->status->status == 0){
                                echo '<option value="1">Active</option>';
                                echo '<option value="0" selected>Not Active</option>';
                            }else{
                                echo '<option value="1" selected>Active</option>';
                                echo '<option value="0">Not Active</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Update Period" name="btnUpdate">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>