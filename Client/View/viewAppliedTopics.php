<h1 class="h3 mb-2 text-gray-800">Applied Topics</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Topic</th>
                    <th>Company</th>
                    <th>Period</th>
                    <th>Stage</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $internships Internship_details */
                foreach ($dataInternship as $internships) {
                    echo '<tr>';
                    if ($_SESSION['id'] == $internships->student_id) {
                        echo '<td>' . $internships->description . '</td>';
                        echo '<td>' . $internships->company_name . '</td>';
                        echo '<td>' . $internships->period_name . '</td>';
                        echo '<td>' . $internships->stage_name . '</td>';
                        if ($internships->status == 0) {
                            echo '<td>Waiting</td>';
                        } else if ($internships->status == 1) {
                            echo '<td>Accepted</td>';
                        } else if ($internships->status == 2) {
                            echo '<td>Rejected</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>