<?php

include_once '../Entity/Stage.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/StageDao.php';

$name = filter_input(INPUT_POST, 'txtName');
$id = filter_input(INPUT_POST,'txtId');
if (View_Util::fieldIsNotEmpty(array($id,$name))){
    $stage = new Stage();
    $stageDao = new StageDao();
    $stage->setId($id);
    $stage->setName($name);
    $result = $stageDao->updateStage($stage);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');