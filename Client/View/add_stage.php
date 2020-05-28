<legend align="center"><h1>Stages Management</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Stage</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtName" placeholder="Stage" required>
                    </div>
                    <input type="submit" value="Add Stage" name="btnAdd">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800">Stages</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Stage Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $stages Stage */
                foreach ($dataStage as $stages) {
                    echo '<tr>';
                    echo '<td>' . $stages->id . '</td>';
                    echo '<td>' . $stages->name . '</td>';
                    echo '<td><button onclick="updateStage(' . $stages->id . ')">Update</button> </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>