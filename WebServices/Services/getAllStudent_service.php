<?php
include_once '../Entity/Student.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StudentDao.php';

$studentDao = new StudentDao();
$students = $studentDao->getAllStudent();
header('Content-type:application/json');
echo json_encode($students);