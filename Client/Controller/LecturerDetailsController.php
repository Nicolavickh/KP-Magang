<?php


class LecturerDetailsController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $lecturer = filter_input(INPUT_POST, 'txtLecturerId');
            $role = filter_input(INPUT_POST, 'txtRoleId');
            $semester = filter_input(INPUT_POST, 'txtSemesterId');
            $year = filter_input(INPUT_POST, 'txtYearId');
            if (View_Util::fieldIsNotEmpty(array($lecturer, $role, $semester, $year))) {
                $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addLecturerDetails_service.php", array('txtLecturerId' => $lecturer, 'txtRoleId' => $role, 'txtSemesterId' => $semester, 'txtYearId' => $year));
            }
        }
        $dataForAcademicYear = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllYear_service.php", array());
        $dataAcademicYear = json_decode($dataForAcademicYear);
        $dataForLecturer = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllLecturer_service.php", array());
        $dataLecturer = json_decode($dataForLecturer);
        $dataForRole = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllRole_service.php", array());
        $dataRole = json_decode($dataForRole);
        $dataForSemester = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllSemester_service.php", array());
        $dataSemester = json_decode($dataForSemester);
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllLecturerDetails_service.php", array());
        $dataDetails = json_decode($data);
        include_once 'Client/View/add_lecturerDetails.php';
    }

    public function update()
    {
        $lecturerId = filter_input(INPUT_GET, 'lecturerId');
        $roleId = filter_input(INPUT_GET, 'roleId');
        $semesterId = filter_input(INPUT_GET, 'semesterId');
        $yearId = filter_input(INPUT_GET, 'yearId');
        $status = filter_input(INPUT_GET, 'status');
        Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateLecturerDetails_service.php", array('txtLecturerId' => $lecturerId, 'txtRoleId' => $roleId, 'txtSemesterId' => $semesterId, 'txtYearId' => $yearId, 'txtStatus' => $status));
        header("location:index.php?menu=lecturerDetails");
    }
}