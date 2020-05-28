<?php

include_once '../Entity/Stage.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StageDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $StageDao = new StageDao();
    $result = $StageDao->getStage($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);