<?php

include_once '../Entity/Period.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/PeriodDao.php';


$PeriodDao = new PeriodDao();
$result = $PeriodDao->getActivePeriod();
$data = array('status' => $result);

header('Content-type:application/json');
echo json_encode($data);