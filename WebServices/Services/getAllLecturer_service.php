<?php
include_once '../Entity/Lecturer.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDao.php';

$lecturerDao = new LecturerDao();
$lecturers = $lecturerDao->getAllLecturer();
header('Content-type:application/json');
echo json_encode($lecturers);