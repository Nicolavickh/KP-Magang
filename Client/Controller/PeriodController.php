<?php


class PeriodController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $name = filter_input(INPUT_POST, 'txtName');
            if (View_Util::fieldIsNotEmpty(array($name))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addPeriod_service.php", array('txtName' => $name));
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllPeriod_service.php", array());
        $dataPeriod = json_decode($data);
        include_once 'Client/View/add_period.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getPeriod_service.php", array('txtId' => $id));
            $period = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $status = filter_input(INPUT_POST,'txtStatus');
            if (View_Util::fieldIsNotEmpty(array($name,$status))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updatePeriod_service.php", array('txtId' => $id, 'txtName' => $name, 'txtStatus' => $status));
                header("location:index.php?menu=period");
            } else {
                $err_msg = 'Please Check Input !';
            }
            header("location:index.php?menu=period");
        }
        include_once 'Client/View/update_period.php';
    }


}