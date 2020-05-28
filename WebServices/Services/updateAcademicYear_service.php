<?php

include_once '../Entity/Academic_year.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/AcademicYearDao.php';

$Year = filter_input(INPUT_POST, 'txtYear');
$id = filter_input(INPUT_POST,'txtId');
if (View_Util::fieldIsNotEmpty(array($id,$Year))){
    $academicYear = new Academic_year();
    $academicYearDao = new AcademicYearDao();
    $academicYear->setId($id);
    $academicYear->setYear($Year);
    $result = $academicYearDao->updateAcademicYear($academicYear);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');