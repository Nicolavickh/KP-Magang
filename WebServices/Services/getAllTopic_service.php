<?php
include_once '../Entity/Topic.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/TopicDao.php';

$topicDao = new TopicDao();
$topics = $topicDao->getAllTopic();
header('Content-type:application/json');
echo json_encode($topics);