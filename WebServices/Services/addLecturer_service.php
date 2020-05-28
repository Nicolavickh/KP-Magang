<?php

include_once '../Entity/Lecturer.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/LecturerDao.php';
include_once '../Utility/View_Util.php';

$id = filter_input(INPUT_POST, 'txtId');
$name = filter_input(INPUT_POST, 'txtName');
$email = filter_input(INPUT_POST, 'txtEmail');
$phone = filter_input(INPUT_POST, 'txtPhone');
$password = filter_input(INPUT_POST, 'txtPassword');
if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone, $password))) {
    $lecturer = new Lecturer();
    $lecturerDao = new LecturerDao();
    $lecturer->setId($id);
    $lecturer->setName($name);
    $lecturer->setPhone($phone);
    $lecturer->setPassword($password);
    $lecturer->setEmail($email);
    $res = $lecturerDao->addLecturer($lecturer);
    $data = array('status' => $res);
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);