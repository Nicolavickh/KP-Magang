<?php


class AcademicYearController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $year = filter_input(INPUT_POST, 'txtYear');
            if (View_Util::fieldIsNotEmpty(array($year))) {
                $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addYear_service.php", array('txtYear' => $year));
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllYear_service.php", array());
        $dataYear = json_decode($data);
        include_once 'Client/View/add_academicYear.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getAcademicYear_service.php", array('txtId' => $id));
            $year = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $year = filter_input(INPUT_POST, 'txtYear');
            if (View_Util::fieldIsNotEmpty(array($year))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateAcademicYear_service.php", array('txtId' => $id, 'txtYear' => $year));
                header("location:index.php?menu=academicYear");
            } else {
                $err_msg = 'Please Check Input !';
            }
            header("location:index.php?menu=academicYear");
        }
        include_once 'Client/View/update_academicYear.php';
    }
}