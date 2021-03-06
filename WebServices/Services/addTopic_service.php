<?php

include_once '../Entity/Topic.php';
include_once '../Entity/Company.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/TopicDao.php';
include_once '../Utility/View_Util.php';

$description = filter_input(INPUT_POST, 'txtDescription');
$requirements = filter_input(INPUT_POST, 'txtRequirements');
$facilities = filter_input(INPUT_POST, 'txtFacilities');
$start_date = filter_input(INPUT_POST, 'txtStartDate');
$finish_date = filter_input(INPUT_POST, 'txtFinishDate');
$term = filter_input(INPUT_POST, 'txtTerm');
$benefit = filter_input(INPUT_POST, 'txtBenefit');
$number_of_people = filter_input(INPUT_POST, 'txtNumbOfPeople');
$url = filter_input(INPUT_POST, 'txtUrl');
$company_id = filter_input(INPUT_POST, 'txtCompanyId');
if (View_Util::fieldIsNotEmpty(array($description,$requirements,$start_date,$finish_date,$term,$number_of_people,$company_id))) {
    $topic = new Topic();
    $topicDao = new TopicDao();
    $topic->setDescription($description);
    $topic->setRequirements($requirements);
    $topic->setFacilities($facilities);
    $topic->setStartDate($start_date);
    $topic->setFinishDate($finish_date);
    $topic->setTerm($term);
    $topic->setBenefit($benefit);
    $topic->setNumberOfPeople($number_of_people);
    $topic->setUrl($url);
    $company = new Company();
    $company->setId($company_id);
    $topic->setCompany($company);
    $res = $topicDao->addTopic($topic);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);