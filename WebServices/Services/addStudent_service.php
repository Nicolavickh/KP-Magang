<?php

include_once '../Entity/Student.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/StudentDao.php';
include_once '../Utility/View_Util.php';

$id = filter_input(INPUT_POST, 'txtId');
$name = filter_input(INPUT_POST, 'txtName');
$email = filter_input(INPUT_POST, 'txtEmail');
$password = filter_input(INPUT_POST, 'txtPassword');
$phone = filter_input(INPUT_POST, 'txtPhone');
$photo = filter_input(INPUT_POST, 'txtPhoto');
$cv = filter_input(INPUT_POST, 'txtCv');
$transcript  = filter_input(INPUT_POST, 'txtTranscript');
$address = filter_input(INPUT_POST, 'txtAddress');
if (View_Util::fieldIsNotEmpty(array($name))) {
    $student = new Student();
    $studentDao = new StudentDao();
    $student->setName($name);
    $student->setEmail($email);
    $student->setPassword($password);
    $student->setPhone($phone);
    $student->setPhoto($photo);
    $student->setCv($cv);
    $student->setTranscript($transcript);
    $student->setAddress($address);
    $student->setId($id);
    $res = $studentDao->addStudent($student);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);