<?php

include_once '../Entity/Role.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/RoleDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $RoleDao = new RoleDao();
    $result = $RoleDao->getRole($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);