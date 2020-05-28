<?php


class InternshipDetailsController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $description = filter_input(INPUT_POST, 'txtDescriptions');
            $requirements = filter_input(INPUT_POST, 'txtRequirements');
            $facilities = filter_input(INPUT_POST, 'txtFacilities');
            $start_date = filter_input(INPUT_POST, 'txtStartDate');
            $finish_date = filter_input(INPUT_POST, 'txtFinishDate');
            $term = filter_input(INPUT_POST, 'txtTerm');
            $benefit = filter_input(INPUT_POST, 'txtBenefit');
            $number_of_people = filter_input(INPUT_POST, 'txtNumbOfPeople');
            $url = filter_input(INPUT_POST, 'txtUrl');
            $company_id = filter_input(INPUT_POST, 'txtCompanyId');
            if (View_Util::fieldIsNotEmpty(array($description, $requirements, $start_date, $finish_date, $term, $number_of_people, $company_id))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addTopic_service.php", array('txtDescription' => $description, 'txtRequirements' => $requirements, 'txtFacilities' => $facilities, 'txtStartDate' => $start_date, 'txtFinishDate' => $finish_date
                , 'txtTerm' => $term, 'txtBenefit' => $benefit, '' => $benefit, 'txtNumbOfPeople' => $number_of_people, 'txtUrl' => $url, 'txtCompanyId' => $company_id));
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllTopic_service.php", array());
        $dataTopic = json_decode($data);
        include_once 'Client/View/add_internshipDetails.php';
    }

    public function applyTopic()
    {
        $topicId = filter_input(INPUT_GET, 'topicId');
        $canApply = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/checkInternshipStatus_service.php", array('txtStudentId' => $_SESSION['id']));
        if ($canApply == 'true') {
            if (View_Util::fieldIsNotEmpty(array($topicId))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addInternshipDetails_service.php", array('txtStudentId' => $_SESSION['id'], 'txtTopicId' => $topicId));
                header("refresh:0");
                $this->appliedTopic();
            }
        } else {
            echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">You Can\'t Apply For Another Topic Because Either You\'ve Been Accepted In Another Topic Or You\'ve Another Topic That\'s Being Processed !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';

            $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllTopic_service.php", array());
            $dataTopic = json_decode($data);
            include_once 'Client/View/add_internshipDetails.php';
        }
    }

    public function appliedTopic()
    {
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAppliedTopics_service.php", array('txtStudentId' => $_SESSION['id']));
        $dataInternship = json_decode($data);
        include_once 'Client/View/viewAppliedTopics.php';
    }

    public function accOrReject()
    {
        $errMsg = null;
        $studentId = filter_input(INPUT_GET, 'studentId');
        $topicId = filter_input(INPUT_GET, 'topicId');
        $periodId = filter_input(INPUT_GET, 'periodId');
        $stageId = filter_input(INPUT_GET, 'stageId');
        $status = filter_input(INPUT_GET, 'status');
        $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/accOrReject_service.php", array('txtStudentId' => $studentId, 'txtTopicId' => $topicId, 'txtPeriodId' => $periodId, 'txtStageId' => $stageId, 'txtStatus' => $status));
        header("refresh:0");
        $companyController = new CompanyController();
        $companyController->applyingStudents();
    }
}