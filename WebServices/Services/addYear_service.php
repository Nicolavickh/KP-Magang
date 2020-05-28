<?php

include_once '../Entity/Academic_year.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/AcademicYearDao.php';
include_once '../Utility/View_Util.php';

$yearName = filter_input(INPUT_POST, 'txtYear');
if (View_Util::fieldIsNotEmpty(array($yearName))) {
    $year = new Academic_year();
    $yearDao = new AcademicYearDao();
    $year->setYear($yearName);
    $res = $yearDao->addAcademicYear($year);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);