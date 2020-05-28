<?php

include_once '../Entity/Lecturer.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';
include_once '../Dao/LecturerDao.php';

$name = filter_input(INPUT_POST, 'txtName');
$email = filter_input(INPUT_POST, 'txtEmail');
$phone = filter_input(INPUT_POST, 'txtPhone');
$password = filter_input(INPUT_POST, 'txtPassword');
$id = filter_input(INPUT_POST,'txtId');
if (View_Util::fieldIsNotEmpty(array($id,$name,$email,$phone,$password))){
    $lecturer = new Lecturer();
    $lecturerDao = new LecturerDao();
    $lecturer->setId($id);
    $lecturer->setName($name);
    $lecturer->setPhone($phone);
    $lecturer->setPassword($password);
    $lecturer->setEmail($email);
    $result = $lecturerDao->updateLecturer($lecturer);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');