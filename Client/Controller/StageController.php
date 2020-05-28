<?php


class StageController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $name = filter_input(INPUT_POST, 'txtName');
            if (View_Util::fieldIsNotEmpty(array($name))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addStage_service.php", array('txtName' => $name));
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllStage_service.php", array());
        $dataStage = json_decode($data);
        include_once 'Client/View/add_stage.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getStage_service.php", array('txtId' => $id));
            $stage = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $name = filter_input(INPUT_POST, 'txtName');
            if (View_Util::fieldIsNotEmpty(array($name))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateStage_service.php", array('txtId' => $id, 'txtName' => $name));
                header("location:index.php?menu=stage");
            } else {
                $err_msg = 'Please Check Input !';
            }
            header("location:index.php?menu=stage");
        }
        include_once 'Client/View/update_stage.php';
    }

}