<?php
include_once '../Entity/Internship_details.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/InternshipDetailsDao.php';

$internshipDetailsDao = new InternshipDetailsDao();
$internshipDetails = $internshipDetailsDao->getAllInternshipDetails();
header('Content-type:application/json');
echo json_encode($internshipDetails);