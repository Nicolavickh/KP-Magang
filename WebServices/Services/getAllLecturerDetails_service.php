<?php
include_once '../Entity/Lecturer_details.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDetailsDao.php';

$lecturerDetailsDao = new LecturerDetailsDao();
$lecturerDetails = $lecturerDetailsDao->getAllLecturerDetails();
header('Content-type:application/json');
echo json_encode($lecturerDetails);