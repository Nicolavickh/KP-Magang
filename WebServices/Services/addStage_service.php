<?php

include_once '../Entity/Stage.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StageDao.php';
include_once '../Utility/View_Util.php';

$name = filter_input(INPUT_POST, 'txtName');
if (View_Util::fieldIsNotEmpty(array($name))) {
    $stage = new Stage();
    $stageDao = new StageDao();
    $stage->setName($name);
    $res = $stageDao->addStage($stage);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);