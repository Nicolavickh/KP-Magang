<?php

include_once '../Entity/Internship_details.php';
include_once '../Entity/Student.php';
include_once '../Entity/Period.php';
include_once '../Entity/Topic.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/InternshipDetailsDao.php';
include_once '../Dao/PeriodDao.php';
include_once '../Utility/View_Util.php';

$studentId = filter_input(INPUT_POST, 'txtStudentId');
$topicId = filter_input(INPUT_POST, 'txtTopicId');
if (View_Util::fieldIsNotEmpty(array($studentId,$topicId))){
    $internshipDetails = new Internship_details();
    $student = new Student();
    $student->setId($studentId);
    $topic = new Topic();
    $topic->setId($topicId);
    $period = new Period();
    $periodDao = new PeriodDao();
    $period = $periodDao->getActivePeriod();

    $internshipDetails->setPeriod($period);
    $internshipDetails->setStudent($student);
    $internshipDetails->setTopic($topic);

    $internshipDetailsDao = new InternshipDetailsDao();
    $res = $internshipDetailsDao->addInternshipDetails($internshipDetails);
    $data = array('status' => $res);
}else {
    $data = array('status' => 'Invalid Fields');
}
header('Content-type:application/json');
echo json_encode($data);