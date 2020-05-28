<?php

include_once '../Entity/Academic_year.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/AcademicYearDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $AcademicYearDao = new AcademicYearDao();
    $result = $AcademicYearDao->getAcademicYear($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);