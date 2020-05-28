<?php

include_once '../Entity/Role.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/RoleDao.php';

$name = filter_input(INPUT_POST, 'txtName');
$id = filter_input(INPUT_POST,'txtId');
if (View_Util::fieldIsNotEmpty(array($id,$name))){
    $role = new Role();
    $roleDao = new RoleDao();
    $role->setId($id);
    $role->setName($name);
    $result = $roleDao->updateRole($role);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');