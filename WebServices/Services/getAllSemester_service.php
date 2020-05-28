<?php
include_once '../Entity/Semester.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/SemesterDao.php';

$semesterDao = new SemesterDao();
$semesters = $semesterDao->getAllSemester();
header('Content-type:application/json');
echo json_encode($semesters);