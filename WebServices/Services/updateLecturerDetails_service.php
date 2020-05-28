<?php
include_once '../Entity/Lecturer_details.php';
include_once '../Entity/Academic_year.php';
include_once '../Entity/Role.php';
include_once '../Entity/Semester.php';
include_once '../Entity/Lecturer.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/LecturerDetailsDao.php';

$yearId = filter_input(INPUT_POST, 'txtYearId');
$roleId = filter_input(INPUT_POST, 'txtRoleId');
$semesterId = filter_input(INPUT_POST, 'txtSemesterId');
$lecturerId = filter_input(INPUT_POST, 'txtLecturerId');
$status = filter_input(INPUT_POST, 'txtStatus');
if (View_Util::fieldIsNotEmpty(array($yearId,$roleId,$lecturerId,$status,$semesterId))){
    $lecturerDetails = new Lecturer_details();
    $academicYear = new Academic_year();
    $lecturer = new Lecturer();
    $role = new Role();
    $semester = new Semester();
    $lecturerDetailsDao = new LecturerDetailsDao();

    $academicYear->setId($yearId);
    $role->setId($roleId);
    $lecturer->setId($lecturerId);
    $semester->setId($semesterId);

    $lecturerDetails->setLecturer($lecturer);
    $lecturerDetails->setAcademicYear($academicYear);
    $lecturerDetails->setRole($role);
    $lecturerDetails->setSemester($semester);
    $lecturerDetails->setStatus($status);

    $result = $lecturerDetailsDao->updateLecturerDetails($lecturerDetails);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);