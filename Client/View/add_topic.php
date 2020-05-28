<legend align="center"><h1>Topics Management</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4" style="width: 60% !important;">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Topic Description</h6>
                    </div>
                    <div class="card-body">
                    <textarea rows="10" cols="105" name="txtDescriptions" placeholder="Descriptions" required></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Topic Requirements</h6>
                    </div>
                    <div class="card-body">
                    <textarea rows="10" cols="105" name="txtRequirements" placeholder="Requirements"
                              required></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Facilities</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtFacilities" placeholder="Facilities"></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Start Date</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtStartDate" type="date" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Finish Date</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtFinishDate" type="date" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Term</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="number" name="txtTerm" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Benefits</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtBenefit" placeholder="Benefits"></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Number Of People Needed</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="number" name="txtNumbOfPeople" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">URL</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" type="text" name="txtUrl" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company</h6>
                    </div>
                    <div class="card-body">
                        <select style="width: 100%" name="txtCompanyId"
                            <?php
                            if ($_SESSION['role'] == 'company') {
                                echo 'disabled';
                            }
                            ?>>
                            <option selected></option>
                            <?php
                            /* @var $companies Company */
                            if ($_SESSION['role'] == 'company') {
                                echo '<option selected value = "' . $_SESSION['id'] . '">' . $_SESSION['name'] . '</option>';
                            } else {
                                foreach ($dataCompany as $companies) {
                                    echo '<option value = "' . $companies->id . '">' . $companies->name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Add Topic" name="btnAdd">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800">Topics</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <?php if ($_SESSION['role'] != 'company') {
                        echo '<th>ID</th>';
                        echo '<th>Company</th>';
                    }
                    ?>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $topics Topic */
                foreach ($dataTopic as $topics) {
                    echo '<tr>';
                    if ($_SESSION['role'] == 'company') {
                        if ($_SESSION['id'] == $topics->company->id) {
                            echo '<td>' . $topics->description . '</td>';
                            echo '<td><button onclick="updateTopic(' . $topics->id . ')">Update</button> <button onclick="reuseTopic(' . $topics->id . ')">Reuse Topic</button></td>';
                        }
                    } else {
                        echo '<td>' . $topics->id . '</td>';
                        echo '<td>' . $topics->company->name . '</td>';
                        echo '<td>' . $topics->description . '</td>';
                        echo '<td><button onclick="updateTopic(' . $topics->id . ')">Update</button> <button onclick="reuseTopic(' . $topics->id . ')">Reuse Topic</button> </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>