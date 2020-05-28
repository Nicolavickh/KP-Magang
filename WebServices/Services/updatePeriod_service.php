<?php

include_once '../Entity/Period.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/PeriodDao.php';

$name = filter_input(INPUT_POST, 'txtName');
$id = filter_input(INPUT_POST,'txtId');
$status = filter_input(INPUT_POST,'txtStatus');
if (View_Util::fieldIsNotEmpty(array($id,$name,$status))){
    $period = new Period();
    $periodDao = new PeriodDao();
    $period->setId($id);
    $period->setName($name);
    $period->setStatus($status);
    $result = $periodDao->updatePeriod($period);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');