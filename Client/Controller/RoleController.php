<?php

class RoleController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $name = filter_input(INPUT_POST, 'txtName');
            if (View_Util::fieldIsNotEmpty(array($name))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addRole_service.php", array('txtName' => $name));
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllRole_service.php", array());
        $dataRole = json_decode($data);
        include_once 'Client/View/add_role.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getRole_service.php", array('txtId' => $id));
            $role = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $name = filter_input(INPUT_POST, 'txtName');
            if (View_Util::fieldIsNotEmpty(array($name))) {
                Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateRole_service.php", array('txtId' => $id, 'txtName' => $name));
                header("location:index.php?menu=role");
            } else {
                $err_msg = 'Please Check Input !';
            }
            header("location:index.php?menu=role");
        }
        include_once 'Client/View/update_role.php';
    }
}