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
                        <input style="width: 100%" type="text" name="txtName" placeholder="Period" required>
                    </div>
                    <input type="submit" value="Add Period" name="btnAdd">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800">Periods</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Period Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody
                <?php
                /* @var $periods Period */
                foreach ($dataPeriod as $periods) {
                    echo '<tr>';
                    echo '<td>' . $periods->id . '</td>';
                    echo '<td>' . $periods->name . '</td>';
                    if ($periods->status == 1) {
                        echo '<td> Active </td>';
                    } else {
                        echo '<td> Not Active</td>';
                    }
                    echo '<td><button onclick="updatePeriod(' . $periods->id . ')">Update</button> </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>