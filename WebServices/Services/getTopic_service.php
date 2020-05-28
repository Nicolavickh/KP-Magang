<?php

include_once '../Entity/Topic.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/TopicDao.php';

$id = filter_input(INPUT_GET,'txtId');
if (isset($id) && $id != ""){
    $topicDao = new TopicDao();
    $result = $topicDao->getTopic($id);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Id');
}
header('Content-type:application/json');
echo json_encode($data);