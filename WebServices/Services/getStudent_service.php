<?php

include_once '../Entity/Student.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StudentDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $studentDao = new StudentDao();
    $result = $studentDao->getStudent($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);