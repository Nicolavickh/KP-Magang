<h1 class="h3 mb-2 text-gray-800">Applying Students</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered" style="width:100%">
                <thead>
                <tr>
                    <?php
                    if ($_SESSION['role'] == 'company') { ?>
                        <th>Topic</th>
                        <th>Photo</th>
                        <th>Student Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>CV</th>
                        <th>Transcript</th>
                        <th>Action</th>
                    <?php } else { ?>
                        <th>NRP</th>
                        <th>Student Name</th>
                        <th>Company Name</th>
                        <th>Topic</th>
                        <th>Stage</th>
                        <th>Status</th>
                    <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataStudents as $students) {
                    echo '<tr>';
                    if ($_SESSION['role'] == 'company') {
                        if ($students->company_id == $_SESSION['id']) {
                            echo '<td>' . $students->description . '</td>';
                            if ($students->photo != null and file_exists($students->photo)) {
                                echo '<td><img width = "113px" height= "151px" src="' . $students->photo . '"></td>';
                            } else {
                                echo '<td>Photo Not Available</td>';
                            }
                            echo '<td>' . $students->student_name . '</td>';
                            echo '<td>' . $students->phone . '</td>';
                            echo '<td>' . $students->email . '</td>';
                            if ($students->cv != null and file_exists($students->cv)) {
                                echo '<td><a href="' . $students->cv . '" download>Download CV</a></td>';
                            } else {
                                echo '<td>CV Not Available</td>';
                            }
                            if ($students->transcript != null and file_exists($students->transcript)) {
                                echo '<td><a href="' . $students->transcript . '" download>Download Transcript</a></td>';
                            } else {
                                echo '<td>Transcript Not Available</td>';
                            }
                            if ($students->status == 0) {
                                echo '<td><button onclick="topicAcceptance(' . $students->student_id . ',' . $students->topic_id . ',' . $students->stage_id . ',' . $students->period_id . ',1)">Accept</button> <button onclick="topicAcceptance(' . $students->student_id . ',' . $students->topic_id . ',' . $students->stage_id . ',' . $students->period_id . ',2)">Reject</button></td>';
                            } else if ($students->status == 1) {
                                echo '<td>Accepted</td>';
                            } else if ($students->status == 2) {
                                echo '<td>Rejected</td>';
                            }
                        }
                    } else {
                        echo '<td>' . $students->student_id . '</td>';
                        echo '<td>' . $students->student_name . '</td>';
                        echo '<td>' . $students->company_name . '</td>';
                        echo '<td>' . $students->description . '</td>';
                        echo '<td>' . $students->stage_name . '</td>';
                        if ($students->status == 0) {
                            echo '<td>Waiting</td>';
                        } else if ($students->status == 1) {
                            echo '<td>Accepted</td>';
                        } else if ($students->status == 2) {
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