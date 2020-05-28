<?php
include_once '../Entity/Internship_details.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/InternshipDetailsDao.php';

$internshipDetailsDao = new InternshipDetailsDao();
$details = $internshipDetailsDao->getAllAppliedTopics();
header('Content-type:application/json');
echo json_encode($details);