<?php

include_once '../Entity/Role.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/RoleDao.php';
include_once '../Utility/View_Util.php';

$name = filter_input(INPUT_POST, 'txtName');
if (View_Util::fieldIsNotEmpty(array($name))) {
    $role = new Role();
    $roleDao = new RoleDao();
    $role->setName($name);
    $res = $roleDao->addRole($role);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);