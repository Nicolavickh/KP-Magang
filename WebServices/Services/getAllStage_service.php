<?php
include_once '../Entity/Stage.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StageDao.php';

$stageDao = new StageDao();
$stages = $stageDao->getAllStage();
header('Content-type:application/json');
echo json_encode($stages);