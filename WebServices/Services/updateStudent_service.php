<?php

include_once '../Entity/Student.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/StudentDao.php';

$id = filter_input(INPUT_POST, 'txtId');
$name = filter_input(INPUT_POST, 'txtName');
$email = filter_input(INPUT_POST, 'txtEmail');
$phone = filter_input(INPUT_POST, 'txtPhone');
$password = filter_input(INPUT_POST, 'txtPassword');
$photo = filter_input(INPUT_POST, 'txtPhoto');
$cv = filter_input(INPUT_POST, 'txtCv');
$transcript = filter_input(INPUT_POST, 'txtTranscript');
$address = filter_input(INPUT_POST, 'txtAddress');
if (View_Util::fieldIsNotEmpty(array($id,$name,$email,$phone,$password,$address))){
    $student = new Student();
    $studentDao = new StudentDao();
    $student->setId($id);
    $student->setName($name);
    $student->setPhone($phone);
    $student->setPassword($password);
    $student->setEmail($email);
    $student->setCv($cv);
    $student->setTranscript($transcript);
    $student->setPhoto($photo);
    $student->setAddress($address);
    $result = $studentDao->updateStudent($student);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');