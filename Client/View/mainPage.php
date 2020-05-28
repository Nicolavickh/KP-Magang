<?php

$data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllStudent_service.php", array());
$dataStudent = json_decode($data);
$data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllLecturer_service.php", array());
$dataLecturer = json_decode($data);
$data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllTopic_service.php", array());
$dataTopic = json_decode($data);
$data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllCompany_service.php", array());
$dataCompany = json_decode($data);
$data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAppliedTopics_service.php", array());
$dataInternshipDetails = json_decode($data);

$countStudent = count($dataStudent);
$countLecturer = count($dataLecturer);
$countTopic = count($dataTopic);
$countCompany = count($dataCompany);
$countTotalAccepted = 0;
$countTotalRejected = 0;
$countTotalWaiting = 0;
foreach ($dataInternshipDetails as $a){
    if ($a->status == '0'){
        $countTotalWaiting += 1;
    }else if ($a->status == '1'){
        $countTotalAccepted +=1;
    }else if ($a->status == '2'){
        $countTotalRejected +=1;
    }
}
$totalCount = $countTotalAccepted + $countTotalRejected + $countTotalWaiting;
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
    </div>
    <div class="card-body row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countStudent;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Companies</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countCompany ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Lecturers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countLecturer?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Internship Topics</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countTopic?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>
    </div>
    <div class="card-body row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Students Applying</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalCount ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Students Accepted</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countTotalAccepted?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Students Rejected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countTotalRejected?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Students Waiting</div>
                            <div class="h5 mb-0 font-weight-bold text-secondary"><?php echo $countTotalWaiting?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock   fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>