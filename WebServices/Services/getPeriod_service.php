<?php

include_once '../Entity/Period.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/PeriodDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $PeriodDao = new PeriodDao();
    $result = $PeriodDao->getPeriod($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);