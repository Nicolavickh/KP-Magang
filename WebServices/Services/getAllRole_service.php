<?php
include_once '../Entity/Role.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/RoleDao.php';

$roleDao = new RoleDao();
$roles = $roleDao->getAllRole();
header('Content-type:application/json');
echo json_encode($roles);