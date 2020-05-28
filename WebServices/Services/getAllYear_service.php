<?php
include_once '../Entity/Academic_year.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/AcademicYearDao.php';

$academicYearDao = new AcademicYearDao();
$academicYears = $academicYearDao->getAllAcademicYear();
header('Content-type:application/json');
echo json_encode($academicYears);