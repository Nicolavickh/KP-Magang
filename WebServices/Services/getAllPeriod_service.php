<?php
include_once '../Entity/Period.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/PeriodDao.php';

$periodDao = new PeriodDao();
$periods = $periodDao->getAllPeriod();
header('Content-type:application/json');
echo json_encode($periods);