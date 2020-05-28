<?php

include_once '../Entity/Internship_details.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/InternshipDetailsDao.php';

$studentId = filter_input(INPUT_POST,'txtStudentId');
if (isset($studentId) && $studentId != "") {
    $InternshipDetailsDao = new InternshipDetailsDao();
    $result = $InternshipDetailsDao->checkInternshipStatus($studentId);
    $data = $result;
}

header('Content-type:application/json');
echo json_encode($data);