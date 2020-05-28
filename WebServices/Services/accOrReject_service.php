<?php
include_once '../Entity/Internship_details.php';
include_once '../Entity/Student.php';
include_once '../Entity/Period.php';
include_once '../Entity/Topic.php';
include_once '../Entity/Stage.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/InternshipDetailsDao.php';
include_once '../Dao/StageDao.php';

$studentId = filter_input(INPUT_POST, 'txtStudentId');
$topicId = filter_input(INPUT_POST, 'txtTopicId');
$periodId = filter_input(INPUT_POST, 'txtPeriodId');
$stageId = filter_input(INPUT_POST, 'txtStageId');
$status = filter_input(INPUT_POST, 'txtStatus');
if (View_Util::fieldIsNotEmpty(array($studentId,$topicId,$periodId,$status,$stageId))){
    $internshipDetails = new Internship_details();
    $student = new Student();
    $stage = new Stage();
    $newStage = new Stage();
    $period = new Period();
    $topic = new Topic();
    $internshipDetailsDao = new InternshipDetailsDao();
    $stageDao = new StageDao();

    $student->setId($studentId);
    $stage->setId($stageId);
    $period->setId($periodId);
    $topic->setId($topicId);
    $newStage = $stageDao->getFinishedStage();

    $internshipDetails->setStage($stage);
    $internshipDetails->setStudent($student);
    $internshipDetails->setPeriod($period);
    $internshipDetails->setTopic($topic);
    $internshipDetails->setStatus($status);

    $result = $internshipDetailsDao->accOrReject($internshipDetails,$newStage);
    $data = array($result);
}else {
    $data = array('Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);