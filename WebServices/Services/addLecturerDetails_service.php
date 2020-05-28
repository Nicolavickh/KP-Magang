<?php

include_once '../Entity/Lecturer_details.php';
include_once '../Entity/Lecturer.php';
include_once '../Entity/Role.php';
include_once '../Entity/Semester.php';
include_once '../Entity/Academic_year.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDetailsDao.php';
include_once '../Utility/View_Util.php';

$lecturerId = filter_input(INPUT_POST, 'txtLecturerId');
$roleId = filter_input(INPUT_POST, 'txtRoleId');
$semesterId = filter_input(INPUT_POST, 'txtSemesterId');
$yearId = filter_input(INPUT_POST, 'txtYearId');
if (View_Util::fieldIsNotEmpty(array($lecturerId,$roleId,$semesterId,$yearId))) {
    $lecturerDetails = new Lecturer_details();
    $lecturer = new Lecturer();
    $semester = new Semester();
    $role = new Role();
    $year = new Academic_year();
    $lecturer->setId($lecturerId);
    $role->setId($roleId);
    $semester->setId($semesterId);
    $year->setId($yearId);
    $lecturerDetailsDao = new LecturerDetailsDao();
    $lecturerDetails->setLecturer($lecturer);
    $lecturerDetails->setRole($role);
    $lecturerDetails->setSemester($semester);
    $lecturerDetails->setAcademicYear($year);
    $res = $lecturerDetailsDao->addLecturerDetails($lecturerDetails);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);