<h1 class="h3 mb-2 text-gray-800">Internship Details</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr><?php if ($_SESSION['role'] != 'company') { ?>
                        <th>Company</th>
                    <?php } ?>
                    <th>Description</th>
                    <th>Requirements</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $topics Topic */
                foreach ($dataTopic as $topics) {
                    echo '<tr>';
                    if ($_SESSION['role'] == 'company') {
                        if ($topics->company->id == $_SESSION['id']) {
                            echo '<td>' . $topics->description . '</td>';
                            echo '<td>' . $topics->requirements . '</td>';
                            echo '<td>' . date_format(date_create($topics->finish_date),'d M Y') . '</td>';
                            echo '<td>' . date_format(date_create($topics->start_date),'d M Y') . '</td>';
                            if ($_SESSION['role'] == 'student') {
                                echo '<td><button onclick="applyTopic(' . $topics->id . ',' . $_SESSION['id'] . ')">Apply</button> ';
                            } else {
                                echo '<td>';
                            }
                            echo '<button onclick="viewTopic(' . $topics->id . ')">View Details</button> </td>';
                        }
                    } else {
                        echo '<td>' . $topics->company->name . '</td>';
                        echo '<td>' . $topics->description . '</td>';
                        echo '<td>' . $topics->requirements . '</td>';
                        echo '<td>' . date_format(date_create($topics->finish_date),'d M Y') . '</td>';
                        echo '<td>' . date_format(date_create($topics->start_date),'d M Y') . '</td>';
                        if ($_SESSION['role'] == 'student') {
                            echo '<td><button onclick="applyTopic(' . $topics->id . ')">Apply</button> ';
                        } else {
                            echo '<td>';
                        }
                        echo '<button onclick="viewTopic(' . $topics->id . ')">View Details</button> </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
