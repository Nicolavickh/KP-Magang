<?php

include_once '../Entity/Period.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/PeriodDao.php';
include_once '../Utility/View_Util.php';

$name = filter_input(INPUT_POST, 'txtName');
if (View_Util::fieldIsNotEmpty(array($name))) {
    $period = new Period();
    $periodDao = new PeriodDao();
    $activePeriod = $periodDao->getActivePeriod();
    $activePeriod->setStatus(0);
    $periodDao->updatePeriod($activePeriod);
    $period->setName($name);
    $res = $periodDao->addPeriod($period);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);