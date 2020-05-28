<?php

include_once '../Entity/Lecturer.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDao.php';

$id = filter_input(INPUT_POST,'txtId');
if (isset($id) && $id != ""){
    $lecturerDao = new LecturerDao();
    $result = $lecturerDao->getLecturer($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);