<?php


class TopicController
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
                header("refresh:0");
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllTopic_service.php", array());
        $dataTopic = json_decode($data);
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllCompany_service.php", array());
        $dataCompany = json_decode($data);
        include_once 'Client/View/add_topic.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getTopic_service.php", array('txtId' => $id));
            $topic = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
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
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateTopic_service.php", array('txtId' => $id, 'txtDescriptions' => $description, 'txtRequirements' => $requirements, 'txtFacilities' => $facilities, 'txtStartDate' => $start_date, 'txtFinishDate' => $finish_date
                , 'txtTerm' => $term, 'txtBenefit' => $benefit, '' => $benefit, 'txtNumbOfPeople' => $number_of_people, 'txtUrl' => $url, 'txtCompanyId' => $company_id));
                header("location:index.php?menu=topic");
            } else {
                $err_msg = 'Please Check Input !';
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllCompany_service.php", array());
        $dataCompany = json_decode($data);
        include_once 'Client/View/update_topic.php';
    }

    public function viewTopic()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getTopic_service.php", array('txtId' => $id));
            $topic = json_decode($data);
            include_once 'Client/View/view_topic.php';
        }
    }

    public function reuseTopic()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getTopic_service.php", array('txtId' => $id));
            $topic = json_decode($data);
        }

        $reuse = filter_input(INPUT_POST, 'btnReuse');
        if (isset($reuse)) {
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
                $res=Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addTopic_service.php", array('txtDescription' => $description, 'txtRequirements' => $requirements, 'txtFacilities' => $facilities, 'txtStartDate' => $start_date, 'txtFinishDate' => $finish_date
                , 'txtTerm' => $term, 'txtBenefit' => $benefit, '' => $benefit, 'txtNumbOfPeople' => $number_of_people, 'txtUrl' => $url, 'txtCompanyId' => $company_id));
                header("location:index.php?menu=topic");
            } else {
                $err_msg = 'Please Check Input !';
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllCompany_service.php", array());
        $dataCompany = json_decode($data);
        include_once 'Client/View/reuse_topic.php';
    }
}