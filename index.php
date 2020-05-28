<?php
ob_start();
session_start();
include_once 'Client/Controller/CompanyController.php';
include_once 'Client/Controller/AcademicYearController.php';
include_once 'Client/Controller/LecturerController.php';
include_once 'Client/Controller/PeriodController.php';
include_once 'Client/Controller/TopicController.php';
include_once 'Client/Controller/InternshipDetailsController.php';
include_once 'Client/Controller/StudentController.php';
include_once 'Client/Controller/RoleController.php';
include_once 'Client/Controller/StageController.php';
include_once 'Client/Controller/LecturerDetailsController.php';
include_once 'Client/Controller/ProfileController.php';

include_once 'Client/Utility/View_Util.php';
include_once 'Client/Utility/Utility.php';

if (!isset($_SESSION)) {
    $_SESSION = array();
}
if (!isset($_SESSION['user_logged'])) {
    $_SESSION['user_logged'] = false;
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = Null;
}
if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = Null;
}
if (!isset($_SESSION['targetMenu'])) {
    $_SESSION['targetMenu'] = 'student';
} else {
    $login = filter_input(INPUT_GET, 'login');
    if (isset($login) and $login != '') {
        $_SESSION['targetMenu'] = $login;
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="author" content="Nicolavickh Yohanes - 1772016">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>KP Magang</title>

        <link href="Client/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">
        <link href="Client/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="Client/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <script SRC="Client/Scripts/LecturerScript.js"></script>
        <script SRC="Client/Scripts/StudentScript.js"></script>
        <script SRC="Client/Scripts/CompanyScript.js"></script>
        <script SRC="Client/Scripts/TopicScript.js"></script>
        <script SRC="Client/Scripts/ReuseTopicScript.js"></script>
        <script SRC="Client/Scripts/RoleScript.js"></script>
        <script SRC="Client/Scripts/RolesScript.js"></script>
        <script SRC="Client/Scripts/StageScript.js"></script>
        <script SRC="Client/Scripts/AcademicYearScript.js"></script>
        <script SRC="Client/Scripts/PeriodScript.js"></script>
        <script SRC="Client/Scripts/LectDetScript.js"></script>
        <script SRC="Client/Scripts/InternshipDetailsScript.js"></script>
        <script SRC="Client/Scripts/ViewTopicScript.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="Client/vendor/jquery/jquery.min.js"></script>
        <script src="Client/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="Client/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="Client/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="Client/vendor/chart.js/Chart.min.js"></script>
        <script src="Client/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="Client/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="Client/js/demo/chart-area-demo.js"></script>
        <script src="Client/js/demo/chart-pie-demo.js"></script>
        <script src="Client/js/demo/datatables-demo.js"></script>
    </head>
    <body id="page-top" class="bg-gradient-success">
    <div id="wrapper">
        <?php
        if ($_SESSION['user_logged']) { ?>
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
                style="width:300px !important;">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-text mx-3">KP Magang</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <span>Welcome <?php echo $_SESSION['name'] ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                         aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="?menu=profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <?php
                if (($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'koordinator kp' or $_SESSION['role'] == 'koordinator ta' or $_SESSION['role'] == 'dekan' or $_SESSION['role'] == 'ketua prodi if' or $_SESSION['role'] == 'ketua prodi si' or $_SESSION['role'] == 'koordinator magang')) {
                    ?>
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Admins Menu
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a style="width: 100% !important;" class="nav-link collapsed" data-toggle="collapse"
                           data-target="#collapseLecturers"
                           aria-expanded="true" aria-controls="collapseLecturers">
                            <span>Lecturers Menu</span>
                        </a>
                        <div id="collapseLecturers" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Manage:</h6>
                                <a class="collapse-item" href="?menu=lecturer">Lecturers</a>
                                <a class="collapse-item" href="?menu=role">Roles</a>
                                <a class="collapse-item" href="?menu=academicYear">Academic Years</a>
                                <a class="collapse-item" href="?menu=lecturerDetails">Details</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a style="width: 100% !important;" class="nav-link collapsed" data-toggle="collapse"
                           data-target="#collapseStudents"
                           aria-expanded="true" aria-controls="collapseStudents">
                            <span>Students Menu</span>
                        </a>
                        <div id="collapseStudents" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Manage:</h6>
                                <a class="collapse-item" href="?menu=student">Students</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a style="width: 100% !important;" class="nav-link collapsed" data-toggle="collapse"
                           data-target="#collapseCompanies"
                           aria-expanded="true" aria-controls="collapseCompanies">
                            <span>Companies Menu</span>
                        </a>
                        <div id="collapseCompanies" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Manage:</h6>
                                <a class="collapse-item" href="?menu=company">Companies</a>
                                <a class="collapse-item" href="?menu=topic">Topics</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a style="width: 100% !important;" class="nav-link collapsed" data-toggle="collapse"
                           data-target="#collapseInternships"
                           aria-expanded="true" aria-controls="collapseInternships">
                            <span>Internships Menu</span>
                        </a>
                        <div id="collapseInternships" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">View:</h6>
                                <a class="collapse-item" href="?menu=internshipDetails">Internships</a>
                                <a class="collapse-item" href="?menu=applyingStudents">Applying Students</a>
                                <h6 class="collapse-header">Manage:</h6>
                                <a class="collapse-item" href="?menu=period">Period</a>
                                <a class="collapse-item" href="?menu=stage">Stage</a>
                            </div>
                        </div>
                    </li>
                    <?php
                } else if ($_SESSION['user_logged'] and ($_SESSION['role'] == 'student')) {
                    ?>
                    <!-- Heading -->
                    <div class="sidebar-heading">Students Menu</div>

                    <!-- Nav Item - View Internship Topics Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=internshipDetails">
                            <span>View Internship Topics</span>
                        </a>
                    </li>

                    <?php if ($_SESSION['role'] == 'student') { ?>
                        <!-- Nav Item - View Applied Topics Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="?menu=appliedTopic">
                                <span>View Applied Topics</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                } else if ($_SESSION['user_logged'] and $_SESSION['role'] == 'company') {
                    ?><!-- Nav Item - Topics Management Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=topic">
                            <span>Topics Management</span>
                        </a>
                    </li>

                    <!-- Nav Item - My Internship Topics Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=internshipDetails">
                            <span>My Internship Topics</span>
                        </a>
                    </li>

                    <!-- Nav Item - View Applying Students Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=applyingStudents">
                            <span>View Applying Students</span>
                        </a>
                    </li>
                    <?php
                } else if ($_SESSION['role'] == 'dosen') {
                    ?>
                    <!-- Heading -->
                    <div class="sidebar-heading">Lecturers Menu</div>

                    <!-- Nav Item - View Lecturers Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=lecturer">
                            <span>View Lecturers</span>
                        </a>
                    </li>

                    <!-- Nav Item - View Lecturer Details Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="?menu=topic">
                            <span>View Topics</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php
        } else {
            $login = filter_input(INPUT_GET, 'login');
            if (isset($login) and $login != '') {
                $_SESSION['targetMenu'] = $login;
            }
        }
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php
            if ($_SESSION['user_logged']){
                include_once 'Client/View/mainPage.php';
            }?>
            <!-- Main Content -->
            <div id="content" style="padding-top: 10px">
                <div class="container-fluid">
                    <main>
                        <?php
                        if (!$_SESSION['user_logged']) {
                            switch ($_SESSION['targetMenu']) {
                                case 'student':
                                    $studentController = new StudentController();
                                    $studentController->studentLogin();
                                    break;
                                case 'lecturer':
                                    $lecturerController = new LecturerController();
                                    $lecturerController->lecturerLogin();
                                    break;
                                case 'company':
                                    $companyController = new CompanyController();
                                    $companyController->companyLogin();
                                    break;
                            }
                        }
                        $targetMenu = filter_input(INPUT_GET, 'menu');
                        switch ($targetMenu) {
                            case 'lecturer':
                                $lecturerController = new LecturerController();
                                $lecturerController->index();
                                break;
                            case 'lecturerUpdate':
                                $lecturerController = new LecturerController();
                                $lecturerController->update();
                                break;
                            case 'student':
                                $studentController = new StudentController();
                                $studentController->index();
                                break;
                            case 'studentUpdate':
                                $studentController = new StudentController();
                                $studentController->update();
                                break;
                            case 'company':
                                $companyController = new CompanyController();
                                $companyController->index();
                                break;
                            case 'companyUpdate':
                                $companyController = new CompanyController();
                                $companyController->update();
                                break;
                            case 'topic':
                                $topicController = new TopicController();
                                $topicController->index();
                                break;
                            case 'topicUpdate':
                                $topicController = new TopicController();
                                $topicController->update();
                                break;
                            case 'stage':
                                $stageController = new StageController();
                                $stageController->index();
                                break;
                            case 'stageUpdate':
                                $stageController = new StageController();
                                $stageController->update();
                                break;
                            case 'role':
                                $roleController = new RoleController();
                                $roleController->index();
                                break;
                            case 'roleUpdate':
                                $roleController = new RoleController();
                                $roleController->update();
                                break;
                            case 'academicYear':
                                $academicYearController = new AcademicYearController();
                                $academicYearController->index();
                                break;
                            case 'academicYearUpdate':
                                $academicYearController = new AcademicYearController();
                                $academicYearController->update();
                                break;
                            case 'period':
                                $periodController = new PeriodController();
                                $periodController->index();
                                break;
                            case 'periodUpdate':
                                $periodController = new PeriodController();
                                $periodController->update();
                                break;
                            case 'lecturerDetails':
                                $lecturerDetailsController = new LecturerDetailsController();
                                $lecturerDetailsController->index();
                                break;
                            case 'lecturerDetailsButtonPressed':
                                $lecturerDetailsController = new LecturerDetailsController();
                                $lecturerDetailsController->update();
                                break;
                            case 'internshipDetails':
                                $topicController = new InternshipDetailsController();
                                $topicController->index();
                                break;
                            case 'applyTopic':
                                $internshipDetailsController = new InternshipDetailsController();
                                $internshipDetailsController->applyTopic();
                                break;
                            case 'appliedTopic':
                                $internshipDetailsController = new InternshipDetailsController();
                                $internshipDetailsController->appliedTopic();
                                break;
                            case 'applyingStudents':
                                $companyController = new CompanyController();
                                $companyController->applyingStudents();
                                break;
                            case 'accOrReject':
                                $internshipDetailsController = new InternshipDetailsController();
                                $internshipDetailsController->accOrReject();
                                break;
                            case 'viewTopic':
                                $topicController = new TopicController();
                                $topicController->viewTopic();
                                break;
                            case 'reuseTopic':
                                $topicController = new TopicController();
                                $topicController->reuseTopic();
                                break;
                            case 'profile':
                                $profilePageController = new ProfileController();
                                $profilePageController->index();
                                break;
                            case 'profileUpdate':
                                $profilePageController = new ProfileController();
                                $profilePageController->update();
                                break;
                            case 'logOut':
                                session_destroy();
                                header("location:index.php");
                                break;
                            default :
                                include_once 'Client/View/home.php';
                        }
                        ?>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="?menu=logOut">Logout</a>
                </div>
            </div>
        </div>
    </div>

    </body>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>&copy; 1772016-Nicolavickh Yohanes 2020</span>
            </div>
        </div>
    </footer>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "scrollY": "500px",
                "scrollCollapse": true,
                "paging": false
            });
        })
    </script>
    </html>
<?php ob_end_flush(); ?>