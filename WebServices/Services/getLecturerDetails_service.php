<?php

include_once '../Entity/LEcturer_details.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDetailsDao.php';
include_once '../Utility/View_Util.php';

$lecturerId = filter_input(INPUT_GET, 'txtLecturerId');
$roleId = filter_input(INPUT_GET, 'txtRoleId');
$semesterId = filter_input(INPUT_GET, 'txtSemesterId');
$yearId = filter_input(INPUT_GET, 'txtYearId');
if (View_Util::fieldIsNotEmpty(array($lecturerId, $roleId, $semesterId, $yearId))) {
    $LecturerDetailsDao = new LecturerDetailsDao();
    $result = $LecturerDetailsDao->getLecturerDetails($lecturerId,$roleId,$semesterId,$yearId);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);